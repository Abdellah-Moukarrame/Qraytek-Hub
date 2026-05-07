<?php

namespace App\Models\Personne;

use App\Models\Booking;
use App\Models\Personnes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    protected $fillable = [
        'personne_id',
    ];


    public function personne()
    {
        return $this->belongsTo(Personnes::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
