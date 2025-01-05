<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'depart',
        'description',
        'status',
    ];


    public function price()
    {
        // 'service_id' is the foreign key in the service_prices table
        return $this->hasOne(service_price::class, 'service_id');
    }
}
