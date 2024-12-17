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
}
