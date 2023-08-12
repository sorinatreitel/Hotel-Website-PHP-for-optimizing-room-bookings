<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Testimonial extends Model
{
    protected $table = "Testimonials";
    protected $primaryKey = 'id_Testimonial';

    protected $fillable = [
        'id_User',
        'content',
        'rating',
        'id_RoomType'
    ];
}