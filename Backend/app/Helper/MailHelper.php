<?php
use App\Models\Variable;

class MailHelper
{

    static function prepareEmail($data){
        $data['template'] = "emailUsers.emailReplied";
        return self::SendMail($data);
    }

    static function SendMail($emailData){

        \Mail::send($emailData['template'], $emailData, function ($message) use ($emailData) {

            $fromEmailAddress = 'noreply@alshabalriyadi.com';
            $fromDisplayName = Variable::getVar('العنوان عربي');

            if(isset($emailData['fromEmailAddress'])){
                $fromEmailAddress = $emailData['fromEmailAddress'];
            }

            if(isset($emailData['fromDisplayName'])) {
                $fromDisplayName = $emailData['fromDisplayName'];
            }

            $message->from($fromEmailAddress, $fromDisplayName);

            $message->to($emailData['to'])->subject($emailData['subject']);

        });
    }
}
