<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twilionumber;
use Services_Twilio;

class TwilionumberController extends Controller
{
    public function __construct() {
    	$this->Twilionumber = new Twilionumber();
	    $this->client = new Services_Twilio($sid =env('TWILIO_SID'), $token=env('TWILIO_TOKEN'));
    }

    public function twilioNumber(Request $request){
	    $this->Twilionumber->truncate();
	    foreach ( $this->client->account->incoming_phone_numbers as $number) {
		    $input = ['twilio_phone' => $number->phone_number,'phonesid'=>$number->sid];
			$this->Twilionumber->create($input);
	    }
	    $request->session()->flash('success', 'Twilio Numbers Updated On your Local Database');
	    return view('backend.twillionumber');
    }
}
