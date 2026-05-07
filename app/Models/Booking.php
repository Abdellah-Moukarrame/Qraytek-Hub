<?php

namespace App\Models;

use App\Models\Courses;
use App\Models\Payment;
use App\Models\Personne\Student ;
use App\Models\Personne\Teacher;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'student_id',
        'teacher_id',
        'course_id',
        'date',
        'time',
        'duration',
        'topic',
        'notes',
        'status',
        'price',
    ];

    // ─── student relation ─────────────────────
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // ─── teacher relation ─────────────────────
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // ─── course relation ──────────────────────
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    // ─── payment relation ─────────────────────
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
