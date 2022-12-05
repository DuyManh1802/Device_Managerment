<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devicedetail extends Model
{
    use HasFactory;
    protected $table = 'devicedetail';
    protected $fillable = [
        'department_id',
        'device_id',
        'department_used',
        'amount_used',
        'status'
    ];
    public $timestamps = false;
    public function department(){
        return $this->belongsTo(department::class, 'department_id', 'id');
    }
    public function device(){
        return $this->belongsTo(device::class, 'device_id', 'id');
    }
}
