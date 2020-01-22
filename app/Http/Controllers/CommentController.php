<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Data;
use App\Http\Resources\CommentCollection;
use App\Post;
use App\Data\FetchComments;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        return CommentCollection::collection(Comment::all());
    }

    public function filterComment(Request $request)
    {
        app()->make('FetchComments')->getComments();
        $comments = Comment::where('body','!=','null');

        if($request->has('id')){
            $comments->where('id','LIKE',"%$request->id%");
        }
        if($request->has('name')){
            $comments->where('name','LIKE',"%$request->name%");
        }
        if($request->has('email')){
            $comments->where('email','LIKE',"%$request->email%");
        }
        if($request->has('body')){
            $comments->where('body','LIKE',"%$request->body%");
        }
        return response()->json($comments->get());

    }

}
