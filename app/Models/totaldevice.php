<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totaldevice extends Model
{
    use HasFactory;
    protected $table = 'totaldevice';
    protected $fillable = [
        'device_id',
        'depot_id',
        'total_device',
        'warranty_period',
    ];
    public function depot(){
        return $this->belongsTo(depot::class, 'depot_id', 'id');
    }
    public function device(){
        return $this->belongsTo(device::class, 'device_id', 'id');
    }
}
