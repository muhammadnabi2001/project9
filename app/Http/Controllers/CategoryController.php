<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Javob;
use App\Models\Post;
use App\Models\Savol;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('tr','asc')->get();
        //dd($categories);
        $posts=Post::orderBy('id','desc')->paginate(3);
        $savols=Savol::all();
        $variants=Javob::all();
        return view('index',['categories'=>$categories,'posts'=>$posts,'savols'=>$savols,'variants'=>$variants]);
    }
    public function category()
    {
        $categories=Category::orderBy('tr','asc')->get();
        return view('category',['categories'=>$categories]);
    }
    public function create(Request $request)
    {
        //dd($request->all());
        $request->validate(['name'=>'required|max:255','tr'=>'required',],['name.required'=>"nameni to'ldiring",'tr.required'=>'tr ni to\'ldiring']);
        $category=new category();
        $category->name=$request->name;
        $category->tr=$request->tr;
        $category->is_active=$request->is_active;
        $category->save();
        return redirect('/category')->with('success',"Ma'lumot muvaffaqiyatli qo'shildi");
    }
    public function isactive(int $id)
    {
        //dd($id);
        $category=Category::findOrFail($id);
        //dd($category);
        $category->is_active='1';
        $category->save();
        return redirect('/category');

    }
    public function inactive(int $id)
    {
        //dd($id);
        $category=Category::findOrFail($id);
        //dd($category);
        $category->is_active='0';
        $category->save();
        return redirect('/category');

    }
    public function update(Request $request,int $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'tr' => 'required|integer',
        ]);
    
        $category = Category::findOrFail($id);
        //dd($category);
        $category->name = $request->name;
        $category->tr = $request->tr;
        $category->save();
    
        return redirect()->back()->with('success', 'Category updated successfully.');
    }
    public function delete(int $id)
    {
        //dd($id);
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }

        return redirect()->back()->with('error', 'Category not found.');
    }
}
