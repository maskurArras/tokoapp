<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // model kategori terkoneksi ke table kategori
    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    // menjaga table saat proses insert data
    protected $guarded = [];
}
