<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreBlogPostRequest $request)
    {
        (new BlogPost([
            'title' => $request->title,
            'body' => $request->body,
            'featured_image' => $request->file('featured_image')?->store('images'),
        ]))->save();

        return redirect('/posts')->with('success', 'Post saved.');
    }

    public function show(BlogPost $blogPost)
    {
        //
    }

    public function edit(BlogPost $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $post)
    {
        $post->update([
            'title' => $post->title,
            'body' => $post->body,
            'featured_image' => $request->file('featured_image')?->store('images'),
        ]);

        return redirect('/posts')->with('success', 'Post updated.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post removed.');
    }
}
