<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class ModuleContent extends Model
{
    protected $fillable = [
        'module_id',
        'reference',
        'title',
        'description',
        'created_by'
    ];

    public function module()
    {
        return $this->belongsTo('App\Models\Course\CourseModule');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function attendedClasses()
    {
        return $this->belongsToMany('App\Models\User', 'attended_classes');
    }
}
