<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $fillable = [
        'name',
        'manager',
        'address',
    ];

    public function deviceused(){
        return $this->hasMany(deviceused::class, 'department_id', 'id');
    }
}
