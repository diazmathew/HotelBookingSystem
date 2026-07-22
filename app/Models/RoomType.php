<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'description',
        'price',
        'max_occupancy',
        'image',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
