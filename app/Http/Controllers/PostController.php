<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('blog')->paginate(10);

        return response()->json([
            "status" => 1,
            "data" => $posts,
            "msg" => "Posts retrieved successfully"
        ], /*200*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        $post = Post::create([
            'post_title' => $request->post_title,
            'description' => $request->description,
            'blog_id' => $request->blog_id,
            // '' => $request->,
        ]);

        // $post->blog()->create($request->all());
        // $post->blog()->attach($request->blog_id);

        return [
            "status" => 1,
            "data" => [$post, $post->blog_id],
            "msg" => "Post created successfully"
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = $post->with('blog')->get();
        return [
            "status" => 1,
            "data" =>["post" => $post, "blog" => $post->blog],
            "msg" => "Post retrieved successfully"
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        $post->update([
            'post_title' => $request->post_title,
            'description' => $request->description,
            'blog_id' => $request->blog_id,
            // '' => $request->,
        ]);

        return [
            "status" => 1,
            "data" => $post,
            "msg" => "Post updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return [
            "status" => 1,
            "data" => $post,
            "msg" => "Post deleted successfully"
        ];
    }
}
