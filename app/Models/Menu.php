<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable=[
        'id_kategori',
        'gambar',
        'nama_menu',
        'harga',
        'deskripsi',
    ];

    public function kategori(){
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
