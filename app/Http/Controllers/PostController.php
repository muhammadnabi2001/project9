<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function admin()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('admin', ['posts' => $posts, 'categories' => $categories]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id', // 'category_id' uchun tekshirish
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Rasmning maksimal hajmini cheklash
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->text = $request->text;
        $post->category_id = $request->category_id;
        $post->like = 0;
        $post->dislike = 0;
        $post->view = 0;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

            $file->move('img_uploaded/', $filename);
            $post->img = $filename;
        }

        $post->save();

        return redirect('/admin')->with('success', "Ma'lumot muvvafaqiyatli qo'shildi");
    }
    public function update(Request $request, int $id)
    {
        //dd($post);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->text = $request->text;
        $post->category_id = $request->category_id;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

            $file->move('img_uploaded/', $filename);

            $post->img = $filename;
        }

        $post->save();

        return redirect('/admin')->with('success', "Ma'lumot muvvafaqiyatli yangilandi");
    }
    public function delete(int $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->back()->with('success', 'Post deleted successfully.');
        }

        return redirect()->back()->with('error', 'Category not found.');
    }
    public function batafsil(Request $request, int $id)
    {
        //dd($request->ip());
        $userIp = $request->ip();
        $existingView = View::where('post_id', $id)
            ->where('user_ip', $userIp)
            ->first();
        if (!$existingView) {
            $new=Post::findOrFail($id);
            $new->increment('view');

            $view=new View();
            $view->post_id=$id;
            $view->user_ip=$userIp;
            $view->save();
        }
        //dd($id);
        $post = Post::findOrFail($id);
        $categories = Category::all();
        //dd($post);
        return view('batafsil', ['post' => $post, 'categories' => $categories]);
    }
    public function show(int $id)
    {
        //dd($id);
        $posts = Post::where('category_id', $id)->paginate(3);
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'posts' => $posts]);
    }
}
