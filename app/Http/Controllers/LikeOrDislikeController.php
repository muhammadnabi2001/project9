<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LikeorDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class LikeOrDislikeController extends Controller
{
    public function like(Request $request, int $id)
    {
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['error' => 'Siz avval tizimga kirishingiz kerak.']);
        }
        $likeOrDislike = LikeorDislike::where(['users_id' => Auth::id(), 'post_id' => $id])->first();
        if ($likeOrDislike) {
            $likeOrDislike->delete();
            return redirect()->back()->with('success', 'Siz postni like qilishdan voz kechdingiz.');
        } else {
            $likeOrDislike = new LikeOrDislike();
            $likeOrDislike->users_id = Auth::id();
            $likeOrDislike->post_id = $id;
            $likeOrDislike->value=1;
            $likeOrDislike->save();
            return redirect()->back();

        }
    }
}
