<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Module;
use App\Models\Course\Content;
use App\Models\User;

class ContentController extends Controller
{
    public function destroy($id)
    {
        $content = Content::find($id);
        $this->authorize('update', [User::class, $content->module->course]);        
        $content->delete();
        return redirect(route('cursos.remove', $content->module->course->id));
    }
}
