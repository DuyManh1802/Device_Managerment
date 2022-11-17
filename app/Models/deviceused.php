<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deviceused extends Model
{
    use HasFactory;
    protected $table = 'deviceused';
    protected $fillable = [
        'department_id',
        'device_id',
        'amount_used',
    ];
    public function department(){
        return $this->belongsTo(department::class, 'department_id', 'id');
    }
    public function device(){
        return $this->belongsTo(device::class, 'device_id', 'id');
    }
}
