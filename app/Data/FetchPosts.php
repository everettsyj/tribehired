<?php

namespace App\Data;
use App\Data;
use App\Post;

class FetchPosts
{
    public function getPosts(){
        $body = Data::dataCurl('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($body);
        foreach($posts as $post){
            Post::firstOrCreate([
                'user_id' => $post->userId,
                'title' => $post->title,
                'body' => $post->body,
            ]);
        }
        return redirect('api/post');
    }
}
