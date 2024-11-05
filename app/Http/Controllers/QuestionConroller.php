<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Javob;
use App\Models\Savol;
use App\Models\Variant;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class QuestionConroller extends Controller
{
    public function question()
    {
        //dd('question');
        $questions = Savol::orderBy('id', 'desc')->get();
        return view('question', ['questions' => $questions]);
    }
    public function create(Request $request)
    {
        //dd($request->all());
        $request->validate(['title' => 'required|max:255'], ['title.required' => "titleni to'ldiring"]);
        $question = new Savol();
        $question->title = $request->title;
        $question->is_active = $request->is_active;
        $question->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }
    public function update(Request $request, int $id)
    {
        $question = Savol::findOrFail($id);
        //dd($question);
        $request->validate(['title' => 'required'], ['title.required' => 'title ni to\'ldiring']);
        $question->title = $request->title;
        $question->save();
        return redirect()->back()->with('success', "Updated successfully");
    }
    public function delete(int $id)
    {
        //dd($id);
        $question = Savol::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
    public function createvariant(Request $request, int $id)
    {
        //dd($request->all());
        $request->validate(['title' => 'required'], ['title.required' => 'please fill the title']);
        $variant = new Variant();
        $variant->title = $request->title;
        $variant->savol_id = $id;
        $variant->save();
        return redirect()->back()->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");
    }
    public function votes(Request $request)
    {
        $request->validate([
            'savol_id' => 'required|exists:savols,id',
            'variant_id' => 'required|exists:variants,id',
        ]);

        $savolId = $request->input('savol_id');
        $variantId = $request->input('variant_id');
        $userIp = $request->ip();

        $check = Javob::where('savol_id', $savolId)
            ->where('user_ip', $userIp)
            ->first();

        if ($check) {
            return redirect()->back()->with('error', 'Siz allaqachon ovoz bergansiz!');
        }

        Javob::create([
            'savol_id' => $savolId,
            'variant_id' => $variantId,
            'user_ip' => $userIp,
        ]);

        return redirect()->back()->with('success', 'Ovoz berish muvaffaqiyatli amalga oshirildi!');
    }
}
