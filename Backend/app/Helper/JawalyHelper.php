<?php
namespace App\Helper;
header("Content-Type: text/html; charset=utf-8");

use Http;
class JawalyHelper{

	public static function sendSMS($mobileNumber,$messageContent){
		$text = urlencode( $messageContent);
		$url = "http://www.4jawaly.net/api/sendsms.php?username=servers&password=aaa123&numbers=$mobileNumber&message=$text&sender=DSC&unicode=E&return=json";

		$ret = file_get_contents($url);
		// echo nl2br($ret);


		// $header = array(
		// 	"Content-Type" => 'text/html', 
		// 	'charset'=>'utf-8'
		// );  
		// $response = Http::withHeaders($header)->get('http://www.4jawaly.net/api/sendsms.php',[
		// 	'username' => 'servers',
		// 	'password' => 'aaa123',
		// 	'numbers' => $mobileNumber,
		// 	'message' => urlencode( $messageContent),
		// 	'sender' => 'DSC',
		// 	'unicode' => 'E',
		// 	'return' => 'json',
		// ]);
		// return $response->json();
	}
}