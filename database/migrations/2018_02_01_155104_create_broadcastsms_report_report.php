<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastsmsReportReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('broadcastsms_report', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('sms_from');
		    $table->string('sms_to');
		    $table->string('sms_status')->nullable();
		    $table->string('MessageStatus')->nullable();
		    $table->string('ErrorCode')->nullable();
		    $table->string('SmsSid');
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('broadcastsms_report');
    }
}
