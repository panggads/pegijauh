<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasi';

    protected $fillable = [
        'nama',
        'lokasi',
        'keterangan',
        'konten',
        'cover',
        'favorit'
    ];
    
    public function galeri()
    {
        return $this->hasMany(DestinasiGaleri::class, 'id_destinasi');
    }
}

