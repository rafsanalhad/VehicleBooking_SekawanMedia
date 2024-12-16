<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclesModel extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'plate_number',
        'model',
        'year',
        'ownership_type',
        'status',
        'fuel_consumtion',
        'created_at',
        'updated_at',
    ];

}
