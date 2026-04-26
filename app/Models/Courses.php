<?php

namespace App\Models;

use App\Models\Personne\Teacher;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = ['title', 'teacher_id', 'description', 'category', 'level'];

    public function lessons()
    {
        return $this->hasMany(Lessons::class)->orderBy('order');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // public function enrollments()
    // {
    //     return $this->hasMany(Enrollment::class);
    // }
}
