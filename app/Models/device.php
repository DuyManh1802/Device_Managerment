<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;
    protected $table = 'device';
    protected $fillable = [
        'category_id',
        'supplier_id',
        'status_id',
        'name',
        'price',
        'configuration',
        'image'
    ];

    public function category(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function status(){
        return $this->belongsTo(status::class, 'status_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo(supplier::class, 'supplier_id', 'id');
    }
    public function deviceused(){
        return $this->hasMany(deviceused::class, 'device_id', 'id');
    }
    public function totaldevice(){
        return $this->hasMany(totaldevice::class, 'device_id', 'id');
    }

    public function imageUrl(){
        return '/image/device/' .$this->image;
    }
}
