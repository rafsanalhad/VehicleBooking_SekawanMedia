<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalModel extends Model
{
    use HasFactory;
    
    protected $table = 'approval_logs';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'booking_id',
        'approver_id',  
        'level',
        'status',
        'approval_level',
        'approval_date',
    ];

    public function booking()
    {
        return $this->belongsTo(BookingModel::class, 'booking_id');
    }

    public function approver()
    {
        return $this->belongsTo(UserModel::class, 'approver_id');
    }

    public function userFromBooking()
    {
        return $this->booking->user();
    }
    public function vehicleFromBooking()
    {
        return $this->booking->vehicles();
    }
}
