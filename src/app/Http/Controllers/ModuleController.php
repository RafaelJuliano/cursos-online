<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course\Course;
use App\Models\Course\Module;
use App\Models\Course\Content;
use App\Models\User;

class ModuleController extends Controller
{

    

    public function destroy($id)
    {
        $module = Module::find($id);
        $this->authorize('update', [User::class, $module->course]); 
        foreach($module->contents as $content)
            {
                $content->delete();
            }
        $module->delete();       

        return redirect(route('cursos.remove', $module->course->id));
    }
}
