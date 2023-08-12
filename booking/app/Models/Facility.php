<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Facility extends Model
{
    protected $table = "Facility";
    protected $primaryKey = 'id_Facility';

    protected $fillable = [
        'name',
    ];
}