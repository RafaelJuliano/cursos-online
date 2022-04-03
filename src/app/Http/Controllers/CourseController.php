<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Module;
use App\Models\Course\Content;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $this->authorize('create', User::class);
        return view('course.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'title' => 'required',
            'reference' => 'required|unique:courses',
            'description' => 'required',
            'modules' => 'required'
        ]);        

        $course = $request->all();

        $newCourse = new Course;
        $newCourse->reference = $course['reference'];
        $newCourse->title = $course['title'];
        $newCourse->description = $course['description'];
        $newCourse->created_by = Auth::user()->id;;

        $newCourse = $newCourse->save();
        $courseId = Course::where('reference', $course['reference'])->first()->id;            
        $modules = $course['modules'];
        
        foreach($modules as $module)
        {
            $newModule = new Module;
            $newModule->course_id = $courseId;            
            $newModule->title = $module['title'];
            $newModule->description = $module['description'];
            $newModule->created_by = Auth::user()->id;
            $newModule = $newModule->save();
            $moduleId = Module::where('title', $module['title'])->where('course_id', $courseId)->first()->id;
            $contents = $module['contents'];
                
                foreach($contents as $content)
                {
                $newContent = new Content;
                $newContent->module_id = $moduleId;                
                $newContent->title = $content['title'];
                $newContent->content = $content['content'];
                $newContent->created_by = Auth::user()->id;
                $newContent = $newContent->save();
            }
        }

        return redirect(route('cursos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $this->authorize('update', User::class, $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $this->authorize('update', User::class, $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $this->authorize('update', User::class, $course);
    }
}
