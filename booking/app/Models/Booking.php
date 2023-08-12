<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Booking extends Model
{
    protected $table = "Booking";
    protected $primaryKey = 'id_Reservation';

    protected $fillable = [
        'fullName',
        'checkIn',
        'checkOut',
        'status',
        'roomsBooked',
        'numberAdults',
        'numberChildren',
        'id_Room',
        'id_User',
        'id_Payment'
    ];
}

