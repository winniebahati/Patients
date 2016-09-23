<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'patient';

    protected $fillable = [
        'name', 'email', 'dob','email', 'gender', 'marital', 'national', 'nhif', 'phone', 'home', 'location', 'education', 'occupation'
    ];
}
