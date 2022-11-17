<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depot extends Model
{
    use HasFactory;
    protected $table = 'depot';
    protected $fillable = [
        'name',
    ];
    public function totaldevice(){
        return $this->hasMany(totaldevice::class, 'depot_id', 'id');
    }
}
