<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slide;
use Illuminate\View\View;

class BuildSuccess
{
    /**
     * Bind data to the view.
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $posts = Post::where('type', 1)->orderBy('id')->limit(8)->get()->toArray();

        $view->with('posts', $posts);
    }
}