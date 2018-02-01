<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BroadcastsmsReport;
use Services_Twilio;

class BroadcastsmsReportController extends Controller
{
    public function __construct() {
    $this->BroadcastsmsReport = new BroadcastsmsReport();
    }

    public function saveSentResponse($response){
	    $input = ['sms_from' => $response->from,'sms_to'=>$response->to,'sms_status' =>$response->status,'SmsSid'=> $response->sid];
	    $this->BroadcastsmsReport->create($input);
    }
    public function smsReport(Request $request){
	    $postData = '';
		foreach($_REQUEST as $key => $val)
		{
			$postData .= $key." => ".$val."\n \r";
		}
		mail("officezam@gmail.com", "SMS Responce", $postData);

	    $SmsSid         = $request->SmsSid;
	    $user_id        = $request->user_id;
	    $user_phone  	= $request->To;
	    $twilio_Number	= $request->From;
	    $Body  		    = $request->Body;
	    $sms_status	    = $request->SmsStatus;
	    $MessageStatus 	= $request->MessageStatus;
	    $ErrorCode 	    = $request->ErrorCode;

	    if($SmsSid != '' )
	    {
		    $ErrorCodeArray = array(
			    '30001' => 'Queue overflow',
			    '30002' => 'Account suspended',
			    '30003' => 'Unreachable destination handset',
			    '30004' => 'Message blocked',
			    '30005' => 'Unknown destination handset',
			    '30006' => 'Landline or unreachable carrier',
			    '30007' => 'Carrier violation',
			    '30008' => 'Unknown error',
			    '30009' => 'Missing segment',
			    '30010' => 'Message price exceeds max price.'
		    );
		    $ErrorMsg = $ErrorCodeArray[ $ErrorCode ];

		    $broadcast = $this->BroadcastsmsReport->where('SmsSid',$SmsSid)->first();
			if($broadcast)
			{
				$input = ['sms_from' => $twilio_Number,'sms_to'=>$user_phone,'sms_status' =>$sms_status,'SmsSid'=> $SmsSid];
				$this->BroadcastsmsReport->where('SmsSid',$SmsSid)
				->update($input);
			}else{
				$input = ['sms_from' => $twilio_Number,'sms_to'=>$user_phone,'sms_status' =>$sms_status,'SmsSid'=> $SmsSid];
				$this->BroadcastsmsReport->create($input);
			}

	    }

    }


}
