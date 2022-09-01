<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rc extends Model
{
    use HasFactory;

    protected $table = 'rc';
    public $timestamps = false;

    protected $guarded = [];

    public function stnk()
    {
        return $this->belongsTo(Stnk::class, 'id_stnk', 'id');
    }

    public function dpa()
    {
        return $this->hasOne(Dpa::class, 'id_rc', 'id');
    }
}
