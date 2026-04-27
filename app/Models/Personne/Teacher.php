<?php

namespace App\Models\Personne;

use App\Models\Personnes;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'personne_id',
        'subject',
        'experience',
        'status',
        'hourly_rate',
        'cv_path',
        'certificate_path',
        'diploma_path',
        'id_card_path',
    ];

    public function personne()
    {
        return $this->belongsTo(Personnes::class, 'personne_id');
    }
}
