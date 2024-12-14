<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehiclesModel;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'created_by',
        'approval_status',
        'start_date',
        'end_date',
        'purpose',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function approvals()
    {
        return $this->hasMany(ApprovalModel::class, 'booking_id');
    }
    public function vehicles(){
        return $this->belongsTo(VehiclesModel::class, 'vehicle_id');
    }
}
