<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Personnes extends Authenticatable

{
    use Notifiable;

    protected $fillable = ['id','name','role','email','password'];

}
