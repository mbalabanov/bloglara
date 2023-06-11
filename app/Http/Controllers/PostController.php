<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ceatePost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = auth()->user()->id;
        $post = Post::create($incomingFields);

        return redirect('/');
    }

    public function showEditView(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        if (auth()->id() === $post->user_id) {
            $incomingFields = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
            ]);
    
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);
    
            $post->update($incomingFields);
        }

        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        if (auth()->id() === $post->user_id) {
            $post->delete();
        }

        return redirect('/');
    }
}