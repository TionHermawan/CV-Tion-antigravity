<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'alamat',
        'email',
        'telepon',
        'bio',
        'foto',
    ];
}
