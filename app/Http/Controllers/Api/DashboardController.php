<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(Request $request) 
    {
       $user = $request->user();
       $blogs=Blog::where('user_id',$user->id)->withCount('comment')->get();
       return response()->json($blogs);
    }
}
