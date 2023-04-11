<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'county',
        'pincode',
        'status',
        'message',
        'tracking_no',
    ];
}
