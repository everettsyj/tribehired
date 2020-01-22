<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use GuzzleHttp\Client as GuzzleHttpClient;

class DataController extends Controller
{
    // public function dataCurl($url){
    //     $client = new GuzzleHttpClient();
    //     $response = $client->request('GET', $url);
    //     $body = $response->getBody()->getContents();

    //     return $body;
    // }

    // public function getPosts(){
    //     $body = $this->dataCurl('https://jsonplaceholder.typicode.com/posts');
    //     $posts = json_decode($body);
    //     foreach($posts as $post){
    //         Post::firstOrCreate([
    //             'id' => $post->id,
    //             'user_id' => $post->userId,
    //             'title' => $post->title,
    //             'body' => $post->body,
    //         ]);
    //     }
    //     return redirect('api/post');
    // }

    // public function getComments(){
    //     $body = $this->dataCurl('https://jsonplaceholder.typicode.com/comments');
    //     $comments = json_decode($body);
    //     foreach($comments as $comment){
    //         Comment::firstOrCreate([
    //             'id' => $comment->id,
    //             'post_id' => $comment->postId,
    //             'name' => $comment->name,
    //             'email' => $comment->email,
    //             'body' => $comment->body,
    //         ]);
    //     }
    //     return redirect('api/comment');
    // }
}
