<?php
use App\Models\Variable;

class PaymentHelper {
    protected $secret_key;

    function __construct() {
        $this->secret_key = Variable::getVar('SECRET_KEY');
        $this->publish_key = Variable::getVar('PUBLISH_KEY');
    }

    public static function getPaymentInfo($dataArr,$type) {
      $url = "https://oppwa.com/v1/checkouts";
      $entityId = '8ac9a4cd7983dc87017983fdda9003c6';
      // $externalMode = "&testMode=EXTERNAL";
      $externalMode = '';
      if($type == 'MADA'){
        $entityId = '8ac9a4cd7983dc87017983ff8bb703f0';
        $externalMode = '';
      }
      $data = "entityId=".$entityId .
                    "&amount=".$dataArr['price']."" .
                    "&currency=SAR" .
                    "&paymentType=DB".
                    $externalMode.
                    "&merchantTransactionId=".$dataArr['id']."".
                    "&customer.email=".$dataArr['email']."".
                    "&billing.street1=Al Andalus".
                    "&billing.city=Jeddah".
                    "&billing.state=Al Ilham".
                    "&billing.country=SA".
                    "&billing.postcode=23324".
                    "&customer.givenName=Client - ".$dataArr['id']."".
                    "&customer.surname=Client - ".$dataArr['id']."";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGFjOWE0Y2Q3OTgzZGM4NzAxNzk4M2ZkMmM2ZTAzYmJ8VDlUU3NZcFNXNw=='));
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);// this should be set to true in production
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $responseData = curl_exec($ch);
      if(curl_errno($ch)) {
        return curl_error($ch);
      }
      curl_close($ch);
      return json_decode($responseData);
    }

    public static function checkPaymentStatus($paymentId,$type) {
      $url = "https://oppwa.com/v1/checkouts/".$paymentId."/payment";
      $entityId = '8ac9a4cd7983dc87017983fdda9003c6';
      if($type == 'MADA'){
        $entityId = '8ac9a4cd7983dc87017983ff8bb703f0';
      }
      $url .= "?entityId=".$entityId;

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGFjOWE0Y2Q3OTgzZGM4NzAxNzk4M2ZkMmM2ZTAzYmJ8VDlUU3NZcFNXNw=='));
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);// this should be set to true in production
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $responseData = curl_exec($ch);
      if(curl_errno($ch)) {
        return curl_error($ch);
      }
      curl_close($ch);
      return json_decode($responseData);
    }
}

