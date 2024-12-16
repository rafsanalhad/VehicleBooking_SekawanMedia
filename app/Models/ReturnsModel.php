<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BookingModel;
use App\Models\VehiclesModel;

class ReturnsModel extends Model
{
    use HasFactory;

    protected $table = 'returns';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'booking_id',
        'user_id',
        'vehicle_id',
        'return_date',
        'condition',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(VehiclesModel::class, 'vehicle_id');
    }
}
