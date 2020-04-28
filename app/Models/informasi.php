<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informasi extends Model
{

    protected $table = 'rn_informasi';
    protected $foreignkey = 'id_admin';

    protected $fillable = [
        'id_admin',
        'judul',
        'isi',
        'gambar',
        'tanggal',
        'hits'
    ];

    function admin()
    {
        return $this->hasMany(admin::class, 'id_admin');
    }
}
