<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Catogry;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
        $data['listBlogs']=Blog::with('catogry')->withCount('comment')->paginate(6);
        $data['latestBlogs']=Blog::Latest()->take(3)->get();
        $data['catogries']=Catogry::all();

        return [
            'data'=>$data
         ];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $path = $request->file('image')->store('BlogImage');

            Blog::create([
                'user_id' => $request->user()->id,
                'catogry_id'=> $request->catogry_id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $path
            ]);
            
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['blog']=Blog::with('comment')->withCount('comment')->findOrFail($id);
        $data['latestBlogs']=Blog::Latest()->take(3)->get();
        $data['catogries']=Catogry::all();

        return [
            'data'=>$data
         ];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['catogries']=Catogry::all();
        $data['blog']=Blog::with('catogry')->findOrFail($id);
        return [
            'data' => $data
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::findOrFail($id);

        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('BlogImage');


            if ($blog->image) {
                Storage::delete($blog->image);
                $blog->image = $path;
                $blog->save();
            } else {
                $blog->image = $path;
                $blog->save();
            }
        }

        $blog->update($request->except(['image']));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog=Blog::find($id);
        $blog->delete();
        return response()->json('success','Delete Blog Sucessfuly');
    }
}
