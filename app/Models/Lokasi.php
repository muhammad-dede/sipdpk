<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    public $timestamps = false;

    protected $guarded = [];

    public function rak()
    {
        return $this->hasMany(Rak::class, 'id_lokasi', 'id');
    }
}
