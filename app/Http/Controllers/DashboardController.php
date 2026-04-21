<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with("user")
            ->withCount("comments")
            ->latest()
            ->paginate(10);
        return view("dashboard", compact("posts"));
    }
}
