<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\ImageService;
use App\Services\PostService;

class PostController extends Controller
{
    private $postService;
    private $imageService;

    public function __construct(PostService $postService, ImageService $imageService)
    {
        $this->postService = $postService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $path = 'news';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }

        $postList = $this->postService->getPostList()->simplePaginate(12);
        return view('home.post.index', compact('postList'));
    }

    public function listPost($news, $lug)
    {
        $path = 'news';
        if (request()->segment(1) != trans($path)) {
            return redirect(trans($path));
        }
        $cateogry = Category::where('slug', $lug)->first()->toArray();
        $postList = Post::wherehas('category', function($query) use ($cateogry){
            $query->where('id', $cateogry['id']);
        })->paginate(12);

        return view('home.post.index', compact('cateogry', 'postList'));
    }

    public function detail($news, $lugCategory, $sugPost)
    {
        $path = 'news';
        if (request()->segment(1) != trans($path)) {
            return redirect(trans($path));
        }
        $cateogry = Category::where('slug', $lugCategory)->first()->toArray();
        $post = Post::where('slug', $sugPost)->first();
        $seo = $post->seo;

        return view('home.post.detail', compact('cateogry', 'seo', 'post'));
    }
}
