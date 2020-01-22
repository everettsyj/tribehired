<?php

namespace App\Data;
use App\Data;
use App\Comment;

class FetchComments
{
    // public function retrieveComment($comment){
    //     return[
    //         'user_id' => $comment->userId,
    //         'title' => $comment->title,
    //         'body' => $comment->body,
    //     ];
    // }
    public function getComments(){
        $body = Data::dataCurl('https://jsonplaceholder.typicode.com/comments');
        $comments = json_decode($body);
        foreach($comments as $comment){
            Comment::firstOrCreate([
                'post_id' => $comment->postId,
                'name' => $comment->name,
                'email' => $comment->email,
                'body' => $comment->body,
            ]);
        }
        return redirect('api/comment');
    }
}
