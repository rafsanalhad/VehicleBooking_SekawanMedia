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
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'vehicle_id',
        'driver_id',
        'user_id',
        'start_datetime',
        'end_datetime',
        'purpose',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function approvals()
    {
        return $this->hasMany(ApprovalModel::class, 'booking_id');
    }
    public function vehicles()
    {
        return $this->belongsTo(VehiclesModel::class, 'vehicle_id');
    }
    public function driver()
    {
        return $this->belongsTo(UserModel::class, 'driver_id');
    }

    public function fetchApprovalNames()
    {
        return $this->approvals
            ->map(function ($approval) {
                return $approval->approver->name ?? 'Unknown';
            })
            ->implode(', ');
    }
}
