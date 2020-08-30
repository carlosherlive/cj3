<?php
ini_set('max_execution_time',0);  //to avoid execution timeout


$urls=array('http://autobetting.sporting-bots.com/verify/ppal.asp','http://autobetting.co.uk/idevaffiliate/paypal_ipn_buynow.php');  //you can add more urls


$post=http_build_query($_POST); //this converts paypal ipn data to query string


$v=file_get_contents("https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate&$post"); //this verifies the ipn data


$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail('mahiya878@gmail.com',"ipn test",$post,$headers); //added for debugging u can comment out this line  once it works as expected.


if($v=="VERIFIED")
{
foreach($urls as $url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
        
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0");
    	     
curl_setopt($ch, CURLOPT_POST, true);
    	
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    	
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	
curl_setopt($ch, CURLOPT_TIMEOUT,10);
    		
$response = curl_exec($ch);

curl_close($ch);
}
}
?>