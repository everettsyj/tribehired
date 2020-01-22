<?php

namespace App\Http\Controllers;

use App\Data;
use App\Data\FetchComments;
use App\Data\FetchPosts;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    public function index()
    {
        return PostCollection::collection(Post::all());
    }

    public function mostComment()
    {
        app()->make('FetchPosts')->getPosts();
        $topPost = Post::withCount('comments')
        ->orderBy('comments_count','desc')
        ->first();
        return response()->json([
            'post_id' => $topPost->id,
            'post_title' => $topPost->title,
            'post_body' => $topPost->body,
            'total_number_of_comments' => $topPost->comments_count
            ]
        );
    }
}
