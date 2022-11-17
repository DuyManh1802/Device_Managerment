<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'name',
    ];
    public function device(){
        return $this->hasMany(device::class, 'category_id', 'id');
    }
}
