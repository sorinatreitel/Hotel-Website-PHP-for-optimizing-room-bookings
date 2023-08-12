<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class RoomType extends Model
{

    protected $table = "TypeRoom";
    protected $primaryKey = 'id_RoomType';

    protected $fillable = [
        'type',
        'description',
        'price',
        'capacity'
    ];
}

