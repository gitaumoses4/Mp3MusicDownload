<?php
$ip = $_GET['ip'];

echo "ip = $ip<br>";


function random($car) {
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
	$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}

// APPEL
// Génère une chaine de longueur 20
$chaine = random(30);
$iu = random(10);

$headers = array(
'Host: dashboard.nexmo.com',
'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:51.0) Gecko/20100101 Firefox/51.0',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3',
'Accept-Encoding: gzip, deflate, br',
'DNT: 1',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1');

$uri = 'https://dashboard.nexmo.com/sign-up';

$ch = curl_init();
$cookie_file = dirname(__FILE__) . '/cookies.txt';
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_PROXY, $ip);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_REFERER, "https://www.nexmo.com/");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5");
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING ,"");   
$exec = curl_exec($ch);

$text = explode ('_csrf" value="',$exec);
$text2 = explode ('"',$text[1]);
//echo $text1[1]; 
$csrf = $text2[0];
//echo  "$csrf ccc";
$uri = 'https://dashboard.nexmo.com/sign-up';

$headers = array(
'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
'Accept-Encoding:gzip, deflate, br',
'Accept-Language:en-US,en;q=0.8',
'Cache-Control:max-age=0',
'Connection:keep-alive',
'Content-Length:164',
'Content-Type:application/x-www-form-urlencoded',
'Host:dashboard.nexmo.com',
'Origin:https://dashboard.nexmo.com',
'Referer:https://dashboard.nexmo.com/sign-up',
'Upgrade-Insecure-Requests:1',
'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36'
	);

curl_close($ch);

$ch = curl_init();

$cookie_file = dirname(__FILE__) . '/cookie.txt';
$cert_file = dirname(__FILE__)."certificate";

curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_file);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($ch,CURLOPT_SSLCERT,$cert_file );
curl_setopt($ch, CURLOPT_POSTFIELDS, "firstName=hhahahahaha&lastName=uuuu&email=contact".$iu."@".$chaine.".com&phoneCountry=KE&phone=1123497918&password=Azerty001&retryCount=0&_csrf=$csrf&_signUpForm=Sign+up");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIESESSION,  true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_VERBOSE, true);
$verbose = fopen('curl_output.txt', 'w');
curl_setopt($ch, CURLOPT_STDERR, $verbose);
$exec = curl_exec($ch);

echo $exec;

if($exec!=""){
	$text = explode ('curl -X POST  https://rest.nexmo.com',$exec);
	$text2 = explode ('=',$text[1]);

	$text3 = explode (' \\',$text2[1]);
	$key = $text3[0];

	$text3 = explode (' \\',$text2[2]);
	$secret = $text3[0]; 
	echo "le key $key et le secret $secret<br><br>";
}
?>