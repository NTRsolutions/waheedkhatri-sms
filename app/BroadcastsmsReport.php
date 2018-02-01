<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadcastsmsReport extends Model
{
	protected $table = 'broadcastsms_report';
	protected $fillable = ['sms_from','sms_to','sms_status','MessageStatus','ErrorCode','SmsSid'];
}
