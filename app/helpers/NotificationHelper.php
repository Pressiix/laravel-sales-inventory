<?php
/**
 *  Author : Watcharaphon Piamphuetna
 * 
 * ©2020 Bangkok Post Public Company Limited
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\User;

class NotificationHelper extends EmailHelper
{
	public static function sendNotificationEmail()
    {
        //Find team leader email by user team id
        $team_id = Auth::user()->getOriginal()['team_id'];
        $team_user = User::where('team_id', '=', $team_id)->get();
        $email = "";
        foreach($team_user as $key=>$value)
        {
            if(User::getUserRoleById($value['id']) == 'sale-management')
            {
                $email =  $value['email'];
                break;
            }
        }
        if($email == "")
        {
            $email = "watcharapon.piam@gmail.com";
		}

		$data = [
			/** Necessary element (required) */
			'email' => $email,
			'subject'=>'Sending Test Email',
            'title' => 'Notification!, Request form has been created',
			'body' => 'This is for testing email using smtp',
			'template' => 'emails.email'  //views template

			/** Extra element  */
		];

		return self::sendEmail($data);
    }
    
}