<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Resources\PostsResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getAllPosts($limit=null){
        if($limit){
            return PostsResource::collection(Post::take($limit)->get());
        }
        return PostsResource::collection(Post::all());
    }
    public function getPost($slug){
            return new PostsResource(Post::whereSlug($slug)->first());
    }
}
