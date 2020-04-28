<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{    //
    protected $table = 'rn_admin';
    //  protected $incrementing  = false;
    protected $fillable = [
        'id',
        'username',
        'password',
        'email',
        'nama',
        'foto',
        'level',
        'log',
        'remember_token'
    ];
    function informasi()
    {
        return $this->hasMany(informasi::class, 'id_admin');
    }
}
