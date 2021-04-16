<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   

        return view('welcome')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => Post::searched()
        ]);

    }
}
