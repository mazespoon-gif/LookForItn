<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Claim;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $filter = 'all';

    protected function getPosts()
    {
        $query = Post::with(['user', 'pendingClaim', 'claims.user'])
            ->withCount('comments');

        if ($this->filter === 'lost') {
            $query->where('status', 'lost');
        } elseif ($this->filter === 'found') {
            $query->where('status', 'found');
        }

        $posts = $query->latest()->paginate(10);

        return $posts;
    }

    public function render()
    {
        try {
            $posts = $this->getPosts();
        } catch (\Exception $e) {
            Log::error('Dashboard polling error: ' . $e->getMessage());
            $posts = collect([]);
        }

        return view('livewire.dashboard', [
            'posts' => $posts,
        ]);
    }

    public function hydrate()
    {
        $this->resetErrorBag();
    }

    public function setFilter($value)
    {
        $this->filter = $value;
        $this->resetPage();
    }

    public function approveClaim($claimId)
    {
        try {
            $claim = Claim::findOrFail($claimId);
            
            if ($claim->post->user_id !== Auth::id()) {
                $this->dispatch('flux:toast', ['message' => 'Unauthorized', 'status' => 'error']);
                return;
            }

            $claim->update(['status' => 'approved']);
            $claim->post->update(['status' => 'returned']);
            
            Notification::create([
                'user_id' => $claim->user_id,
                'message' => 'Your request has been accepted. You can now contact the owner via email to claim your item.',
                'post_id' => $claim->post_id,
                'type' => 'claim_approved',
            ]);
            
            $this->dispatch('flux:toast', ['message' => 'Claim approved! Item marked as returned.', 'status' => 'success']);
            $this->resetPage();
        } catch (\Exception $e) {
            Log::error('Approve claim error: ' . $e->getMessage());
            $this->dispatch('flux:toast', ['message' => 'Error approving claim', 'status' => 'error']);
        }
    }

    public function rejectClaim($claimId)
    {
        try {
            $claim = Claim::findOrFail($claimId);
            
            if ($claim->post->user_id !== Auth::id()) {
                $this->dispatch('flux:toast', ['message' => 'Unauthorized', 'status' => 'error']);
                return;
            }

            $claim->update(['status' => 'rejected']);
            $claim->post->update(['status' => 'found']);
            
            Notification::create([
                'user_id' => $claim->user_id,
                'message' => 'Your request has been rejected.',
                'post_id' => $claim->post_id,
                'type' => 'claim_rejected',
            ]);
            
            $this->dispatch('flux:toast', ['message' => 'Claim rejected. Status reverted to found.', 'status' => 'success']);
            $this->resetPage();
        } catch (\Exception $e) {
            Log::error('Reject claim error: ' . $e->getMessage());
            $this->dispatch('flux:toast', ['message' => 'Error rejecting claim', 'status' => 'error']);
        }
    }
}
