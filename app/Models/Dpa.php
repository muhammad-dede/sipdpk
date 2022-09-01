<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpa extends Model
{
    use HasFactory;

    protected $table = 'dpa';
    public $timestamps = false;

    protected $guarded = [];

    public function rc()
    {
        return $this->belongsTo(Rc::class, 'id_rc', 'id');
    }

    public function stnk()
    {
        return $this->belongsTo(Stnk::class, 'id_stnk', 'id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak', 'id');
    }
}
