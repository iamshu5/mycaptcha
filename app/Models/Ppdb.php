<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdb';
    protected $primaryKey = 'id_ppdb';
    protected $guarded = [ 'id_ppdb' ];
    protected $filltable = [ 
        'nis', 
        'nama', 
        'jenis_kelamin', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'alamat', 
        'asal_sekolah', 
        'kelas', 
        'jurusan'
    ];
    public $timestamps = false;
}
