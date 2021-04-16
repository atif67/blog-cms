<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with(['post' => $post]);
    }

    public function category(Category $category)
    {   
        $query = request()->query('search');
        
        if($query)
        {
            $posts = Post::where('title', 'like' , '%'.$query.'%')->simplePaginate(3);
        }else{
            $posts = $category->posts()->simplePaginate(3);
        }

        return view('blog.category')->with([
            'category' => $category,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => $posts
            ]);
    }

    public function tag(Tag $tag)
    {
        $query = request()->query('search');
        
        if($query)
        {
            $posts = Post::where('title', 'like' , '%'.$query.'%')->simplePaginate(3);
        }else{
            $posts = $tag->post()->simplePaginate(3);
        }

        return view('blog.tag')->with([
            'tag' => $tag, 
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => $posts
            ]);
    }
}
