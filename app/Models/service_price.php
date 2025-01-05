<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_price extends Model
{
    use HasFactory;

   
    protected $table = 'service_prices'; // Explicitly mention the table name

    protected $fillable = [
        'service_id',
        'price',
        'total_price',
        'grand_price',
    ];

    // public function service()
    // {
    //     // 'service_id' references the id in the service table
    //     return $this->belongsTo(Service::class, 'service_id');
    // }
}
