<?php

namespace App\Mylibs;
use Mail;

class SendingEmail {

    // template name should be 'emails.ifa_registration'
    // you can find the email template file in your resource/emails/emails.ifa_registration.blade.php
    // for use SendingEmail::Send('emails.ifa_registration', $mailArr);
   public static function Send($templateName, $mailArr = array()) {
        $mailArr = [
            // start for required data
            'receiver_email' => $mailArr['email'], // should be customer email address
            'receiver_full_name' => $mailArr['name'],// should be customer receiver full name
            // 'sender_email' => 'idlc_1@gmail.com',// should be sender email. no need to changes this email Now. If you change then need to change also .env file mail configuration.
            'sender_email' => 'idlcaml2018@gmail.com',// should be sender email. no need to changes this email Now. If you change then need to change also .env file mail configuration.
            'sender_full_name' => 'IDLC', // sender full name
            'subject' => $mailArr['subject'], // Just add your subject here
            // End for required data
            // Start Message Body variable (If need any dynamic E-Mail body Values)
            'mobile_no' => $mailArr['mobile_no'], // you can use `mobile_no` variable in your email template file. for creating dynamic message
            'password' => 'Idlcpass2018@',  // you can use `password` variable in your email template file. for creating dynamic message
            'application_no' => $mailArr['application_number'], // you can use `application_no` variable in your email template file. for creating dynamic message
            /*
            .......
            .......
            .......
            .......
            */
            // also you can add your custom variable. which you want to use in email template file. 
            // End Message Body variable
        ];

        if(Mail::send($templateName, $mailArr, function ($m) use ($mailArr) {
            $m->from($mailArr['sender_email'], $mailArr['sender_full_name']);
            $m->to($mailArr['receiver_email'], $mailArr['receiver_full_name'])->subject($mailArr['subject']);
        }))
            return true;
        else
            return false;

    }
}