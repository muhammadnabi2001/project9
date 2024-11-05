<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Savol;
use App\Models\Variant;
use Illuminate\Http\Request;

class QuestionConroller extends Controller
{
    public function question()
    {
        //dd('question');
        $questions=Savol::orderBy('id','desc')->get();
        return view('question',['questions'=>$questions]);
    }
    public function create(Request $request)
    {
        //dd($request->all());
        $request->validate(['title'=>'required|max:255'],['title.required'=>"titleni to'ldiring"]);
        $question=new Savol();
        $question->title=$request->title;
        $question->is_active=$request->is_active;
        $question->save();
        return redirect()->back()->with('success',"Ma'lumot muvaffaqiyatli qo'shildi");
    }
    public function update(Request $request,int $id)
    {
        $question=Savol::findOrFail($id);
        //dd($question);
        $request->validate(['title'=>'required'],['title.required'=>'title ni to\'ldiring']);
        $question->title=$request->title;
        $question->save();
        return redirect()->back()->with('success',"Updated successfully");
    }
    public function delete(int $id)
    {
        //dd($id);
        $question=Savol::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
    public function createvariant(Request $request,int $id)
    {
        //dd($request->all());
       $request->validate(['title'=>'required'],['title.required'=>'please fill the title']);
       $variant=new Variant();
       $variant->title=$request->title;
       $variant->savol_id=$id;
       $variant->save();
       return redirect()->back()->with('success',"Ma'lumot muvaffaqiyatli qo'shildi");
    }
}
