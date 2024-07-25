<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function show(string $id): View
    {
        return view('post.details', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function index(): View
    {
        return view('dashboard', [
            'posts'=> Post::all()
        ]);
    }
}
