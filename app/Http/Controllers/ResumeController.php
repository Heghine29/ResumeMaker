<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ResumeController extends Controller
{
    public function index(){
        $resumes = auth()->user()->resumes;
        foreach ($resumes as $resume){
           $slug_arr =  explode("_",  $resume->slug);
           $slug_str =  implode(" ",  $slug_arr);
           $resume->str_slug = $slug_str;
        }
        return view('resume.index',['resumes'=>$resumes]);
    }

    public function create(){
        return view('resume.create');
    }

    public function store(){
        request()->slug = Str::slug(request('slug'), "_");
        $attributes = $this->validateResume();

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['slug']   = request()->slug;
        Resume::create($attributes);

        return response()->json(['success'=>'The resume has been created successfully, you can create as many resumes as you like']);
    }

    public function show(Resume $resume){
        return view('resume.show',['resume'=>$resume]);
    }

    public function edit(Resume $resume){
        $slug_arr =  explode("_",  $resume->slug);
        $slug_str =  implode(" ",  $slug_arr);
        $resume->str_slug = $slug_str;
        return view('resume.edit', ['resume'=> $resume]);
    }

    public function update(Resume $resume){
        request()->slug = Str::slug(request('slug'), "_");
        $attributes = $this->validateResume();

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $attributes['slug']   = request()->slug;

        $resume->update($attributes);
        return back()->with('success', 'The Resume Updated Successfully');
    }

    public function destroy(Resume $resume){
        $resume->delete();
        return back()->with('success', 'The Resume Deleted Successfully');
    }

    protected function validateResume(?Resume $resume = null): array
    {
        $resume ??= New Resume();

        return request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'thumbnail'=> $resume->exists ? ['image'] : ['required','image'],
            'profession'=>'required',
            'education'=>'required|min:20',
            'work_history'=>'required|min:20',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>['required', new PhoneNumber],
            'slug'=>['required', Rule::unique('resumes','slug')->ignore($resume)],
        ]);
    }
}
