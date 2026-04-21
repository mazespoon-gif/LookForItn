<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminDashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public function mount()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access.');
        }
    }

    public function getStats()
    {
        return [
            'lostItems' => Post::where('status', 'lost')->count(),
            'foundItems' => Post::where('status', 'found')->count(),
            'totalUsers' => User::count(),
        ];
    }

    public function getUsers()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        return $query->latest()->paginate(10);
    }

    public function render()
    {
        try {
            $stats = $this->getStats();
            $users = $this->getUsers();
        } catch (\Exception $e) {
            Log::error('Admin dashboard error: ' . $e->getMessage());
            $stats = ['lostItems' => 0, 'foundItems' => 0, 'totalUsers' => 0];
            $users = collect([]);
        }

        return view('livewire.admin-dashboard', [
            'stats' => $stats,
            'users' => $users,
        ]);
    }
}
