<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class SpecialDate extends Model
{
    protected $table = "HistoryPrice";
    protected $primaryKey = 'id_HistoryPrice';

    protected $fillable = [
        'dateStart',
        'dateEnd',
        'price',
        'id_RoomType'
    ];
}