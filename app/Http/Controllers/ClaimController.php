<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Post;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = Claim::with(['post', 'user'])
            ->whereHas('post', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('claims.index', compact('claims'));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'description' => 'required|string|min:10',
            'identifiers' => 'required|string|min:2',
        ]);

        if (!Auth::check()) {
            throw ValidationException::withMessages([
                'description' => 'You must be logged in to claim an item.',
            ]);
        }

        if ($post->user_id === Auth::id()) {
            throw ValidationException::withMessages([
                'description' => 'You cannot claim your own post.',
            ]);
        }

        if ($post->status !== 'found') {
            throw ValidationException::withMessages([
                'description' => 'This item cannot be claimed.',
            ]);
        }

        $existingClaim = Claim::where('post_id', $post->id)
            ->where('status', 'pending')
            ->first();

        if ($existingClaim) {
            throw ValidationException::withMessages([
                'description' => 'This item already has a pending claim.',
            ]);
        }

        $answers = "Description: " . $request->description . "\n\nUnique Identifiers: " . $request->identifiers;

        $claim = Claim::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'answers' => $answers,
            'status' => 'pending',
        ]);

        $post->update(['status' => 'pending']);

        return redirect()->back()->with('status', 'Claim submitted successfully! Your claim is pending admin approval.');
    }

    public function approve(Claim $claim)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $claim->update(['status' => 'approved']);
        $claim->post->update(['status' => 'returned']);

        Notification::create([
            'user_id' => $claim->user_id,
            'message' => 'Your request has been accepted. You can now contact the owner via email to claim your item.',
            'post_id' => $claim->post_id,
            'type' => 'claim_approved',
        ]);

        return back()->with('success', 'Claim approved! The item has been marked as returned.');
    }

    public function reject(Claim $claim)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $claim->update(['status' => 'rejected']);
        $claim->post->update(['status' => 'found']);

        Notification::create([
            'user_id' => $claim->user_id,
            'message' => 'Your request has been rejected.',
            'post_id' => $claim->post_id,
            'type' => 'claim_rejected',
        ]);

        return back()->with('success', 'Claim rejected. The item status has been reverted to found.');
    }
}
