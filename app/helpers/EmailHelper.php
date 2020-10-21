<?php
/**
 *  Author : Watcharaphon Piamphuetna
 * 
 * ©2020 Bangkok Post Public Company Limited
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Log;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
	public static function sendEmail($data)
    {
		  $details = $data;
		
       $send = Mail::to($details['email'])
      //  ->cc($moreUsers)
       ->send(new \App\Mail\SendMail($details));

       echo "<pre/>"; print_r($send);

    }
    
}