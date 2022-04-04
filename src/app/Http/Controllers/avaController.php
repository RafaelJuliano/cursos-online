<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Module;
use App\Models\Course\Content;
use App\Models\User;


class avaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = $user->subscriptions()->get();
        return view('ava.index', compact('courses'));
    }

    public function showModules($id){
        $user = Auth::user();
        $course = Course::findOrFail($id);        
        return view('ava.modules', compact('course'));
    }

    public function showContents($id){
        $user = Auth::user();
        $module = Module::findOrFail($id);        
        return view('ava.contents', compact('module'));
    }

    public function showContent($id){
        $user = Auth::user();
        $content = Content::findOrFail($id);        
        return view('ava.content', compact('content'));
    }

    public function attendClass(Request $request, $id){
        $user = Auth::user();
        $content = Content::findOrFail($id);
        $module = $content->module;
        $user->attendedClasses()->attach($id);
        return view('ava.contents', compact('module'));
    }
}
