<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Page;

class AboutController extends Controller
{
    public function index()
    {
        $path = 'about-us';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
       
        $page = Page::where('slug','like', '%' . request()->path() . '%')->first();
        $seo = $page->seo;

        return view('home.' . $path . '.index', ['page' => $page->toArray(), 'seo' => $seo]);
    }

    public function getPage($page)
    {
        $path = 'about-us';
        
        $page = Page::where('slug','like', '%' . $page . '%')->first();
        $seo = $page->seo;

        return view('home.' . $path . '.index', ['page' => $page->toArray(), 'seo' => $seo]);
    }
}
