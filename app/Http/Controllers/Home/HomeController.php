<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $countPostCategory = Category::with('postList')->whereNull('category_id')->get()->toArray();

        return view('home.index', compact('agent', 'countPostCategory'));
    }
}
