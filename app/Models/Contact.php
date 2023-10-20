<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    protected $guarded = [ 'id_contact' ];
    protected $filltable = [ 'name', 'email', 'phone', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'website', 'message'];
    public    $timestamps = false; // Tidak memakai Data Migration
}
