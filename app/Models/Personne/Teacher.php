<?php

namespace App\Models\Personne;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Courses;
use App\Models\Booking;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'personne_id',
        'subject',
        'experience',
        'status',
        'hourly_rate',
        'bio',
        'cv_path',
        'certificate_path',
        'diploma_path',
        'id_card_path',
    ];

    public function personne()
    {
        return $this->belongsTo(\App\Models\Personnes::class, 'personne_id');
    }

    public function courses()
    {
        return $this->hasMany(Courses::class, 'teacher_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'teacher_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}
