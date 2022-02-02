<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Catogry;
use Illuminate\Http\Request;

class CatogryBlogsController extends Controller
{
    //

    public function index()
    {
        $catogries=Catogry::all();

        return $catogries;
    }

    public function show($id) 
    {
        $catogry=Catogry::findOrFail($id);
        
        $data['listBlogs']=Blog::where('catogry_id',$catogry->id)->with('catogry')->withCount('comment')->paginate(6);
        $data['latestBlogs']=Blog::Latest()->take(3)->get();
        $data['catogries']=Catogry::all();

        return [
            'data'=>$data
         ];
    }
}
