<?php

namespace App\Services;

use Twilio\Rest\Client;

class SmsService
{

    public function sendSms($phone, $namepr, $name)
    {
        $receiv = '+222'.$phone;

        $body = "السيد / السيدة $namepr,

        أتمنى أن تكونوا بأتم الصحة والعافية. نحن نود أن نعبر لكم عن تقديرنا وامتناننا العميق لاختياركم لإشراك $name في مدرستنا.
        
        نحن متحمسون للتعاون معكم . إذا كان لديكم أي استفسارات أ خلال هذا العام الدراسي، فلا تترددوا في الاتصال بنا في أي وقت.
        
        مرة أخرى، شكراً جزيلاً على ثقتكم بنا، ونتطلع إلى تحقيق نجاح وتجربة تعليمية مثمرة لابنكم.

        *مع أطيب التحيات*
        ";
        // Twilio credentials
        $sid = "AC05feb9f0bdf1c20d351997fcac80a277";
        $token = "5a76b9b9414504898bd0d56e9ea9117b";

        // Initialize the Twilio client
        $twilio = new Client($sid, $token);

        // Create and send the SMS
        $message = $twilio->messages->create(
            $receiv, // Recipient's phone number
            [
                "from" => "BMI", // Your Twilio phone number
                "body" => "$body"
            ]
        );

        // Output the Twilio SID to verify the SMS was sent
      //  dd($message->sid);
    }



}