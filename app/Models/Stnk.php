<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stnk extends Model
{
    use HasFactory;

    protected $table = 'stnk';
    public $timestamps = false;

    protected $guarded = [];

    public function samsat()
    {
        return $this->belongsTo(Samsat::class, 'id_samsat', 'id');
    }
}
