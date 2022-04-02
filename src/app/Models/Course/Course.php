<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   protected $fillable = [
        'reference',
        'title',
        'description',
        'created_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function modules()
    {
        return $this->hasMany('App\Models\Course\CourseModule');
    }

    public function subscriptions()
    {
        return $this->belongsToMany('App\Models\User', 'subscriptions');
    }
    
}
