<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lessons extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'duration',
        'order',
        'video_path',
        'file_path',
    ];

    // ─── Relationships ────────────────────────────────

    // Lesson belongs to a Course
    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id')->orderBy('order');
    }

    // ─── Accessors ────────────────────────────────────

    // Format duration in minutes to "Xh Ym"
    public function getFormattedDurationAttribute()
    {
        if ($this->duration < 60) {
            return $this->duration . ' min';
        }
        $hours   = intdiv($this->duration, 60);
        $minutes = $this->duration % 60;
        return $minutes > 0 ? "{$hours}h {$minutes}min" : "{$hours}h";
    }

    // Get video URL
    public function getVideoUrlAttribute()
    {
        return $this->video_path
            ? asset('storage/' . $this->video_path)
            : null;
    }

    // Get file URL
    public function getFileUrlAttribute()
    {
        return $this->file_path
            ? asset('storage/' . $this->file_path)
            : null;
    }
}
