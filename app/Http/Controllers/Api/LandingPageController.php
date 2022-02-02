<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Catogry;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function index() 
    {
        $data['carosualBlogs']=Blog::withCount('comment')->with('catogry')->inRandomOrder()->take(7)->get();
        $data['listBlogs']=Blog::withCount('comment')->with('catogry')->inRandomOrder()->take(3)->get();
        $data['latestBlogs']=Blog::Latest()->take(3)->get();
        $data['catogries']=Catogry::all();


        return [
            'data'=>$data
         ];
    }
}
