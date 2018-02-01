<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twilionumber extends Model
{
	protected $table = 'twilio_numbers';
	protected $fillable = ['twilio_phone','phonesid'];


}
