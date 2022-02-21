<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\Slide;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Bind data to the view.
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::with('childList')->whereNull('category_id')->get()->toArray();
        $slides = Slide::orderBy('order')->get()->toArray();
        $pages = Page::get()->toArray();

        $view->with('categories', $categories)
        ->with('slides', $slides)
        ->with('pages', $pages);
    }
}