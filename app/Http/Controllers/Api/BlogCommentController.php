<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    //
    public function store($id,Request $request)
    {
        $blog=Blog::findOrFail($id);

        if ($request->email) {
            # code...
            $user=User::where('email',$request->email)->first();

            if ($user == null) {
                # code...
                $user=User::create([
                    'email' => $request->email
                ]);
            }
        }
        else
        {
            $user = $request->user();
        }

       $comment = Comment::create([
            'user_id'=>$user->id,
            'blog_id'=>$blog->id,
            'subject'=>$request->subject,
            'content'=>$request->content,
        ]);

        return response()->json($comment);

       
    }
}
