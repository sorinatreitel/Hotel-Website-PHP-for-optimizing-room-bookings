<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Room extends Model
{
    use SoftDeletes;

    protected $table = "Room";
    protected $primaryKey = 'id_Room';

    protected $fillable = [
        'roomNumber',
        'status',
        'image',
        'id_RoomType'
    ];

    protected $dates = ['deleted_at'];
}

