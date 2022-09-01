<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Samsat extends Model
{
    use HasFactory;

    protected $table = 'samsat';
    public $timestamps = false;

    protected $guarded = [];

    public function stnk()
    {
        return $this->hasMany(Stnk::class, 'id_samsat', 'id');
    }
}
