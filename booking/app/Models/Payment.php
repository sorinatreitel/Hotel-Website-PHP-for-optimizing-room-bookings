<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Payment extends Model
{
    protected $table = "Payment";
    protected $primaryKey = 'id_Payment';

    protected $fillable = [
        'typePayment',
        'dateOfPay',
        'ammount'
    ];
}

