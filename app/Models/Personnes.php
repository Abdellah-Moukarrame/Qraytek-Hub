<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Personnes extends Authenticatable
{

    protected $fillable = ['id','name','role','email','password'];

}
