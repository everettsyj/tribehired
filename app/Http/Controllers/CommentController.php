<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function filterComment(Request $request){
        $search = $request->get('q');
        $comments = Comment::where('post_id','like','%'.$search.'%')
                    ->orWhere('id','LIKE',"%$search%")
                    ->orWhere('name','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%")
                    ->orWhere('body','LIKE',"%$search%")
                    ->orderBy('id')
                    ->get();

        foreach($comments as $comment){
            $result[] =[
                'id' => $comment['id'],
                'post_id' => $comment['post_id'],
                'name' => $comment['name'],
                'email' => $comment['email'],
                'body' => $comment['body']
                ];
            }
            return response()->json($result);
        }

}


