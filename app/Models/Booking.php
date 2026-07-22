<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RoomType;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_type_id',
        'customer_name',
        'check_in_date',
        'check_out_date',
        'payment_receipt',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
