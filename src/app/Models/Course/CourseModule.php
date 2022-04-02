<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    protected $fillable = [
        'course_id',
        'reference',
        'title',
        'description',
        'created_by'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course\Course');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Course\ModuleContent');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
