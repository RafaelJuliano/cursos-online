<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
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
        return $this->hasMany('App\Models\Course\Content');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
