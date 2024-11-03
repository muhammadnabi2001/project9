<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, int $id)
    {
        //dd($request->body,$id,auth()->id());
         if (!auth()->check()) {
            return redirect('/login')->withErrors(['error' => 'Siz avval tizimga kirishingiz kerak.']);
        }

        $request->validate([
            'body' => 'required|string|max:255'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->post_id = $id; 

        $comment->save();

        return redirect()->back()->with('success', "Comment created successfully");
    }
}
