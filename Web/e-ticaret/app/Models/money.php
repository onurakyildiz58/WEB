<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class money extends Model
{
    use HasFactory;
    protected $table = 'money';
    protected $fillable = [
      'user_id',
      'card_owner',
      'card_number',
      'card_month',
      'card_year',
      'card_cvv',
      'card_money',
    ];
}
