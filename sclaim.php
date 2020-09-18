<?php

//ikan hiyuu mamam tomat
//error? bodomatttttt

	echo "Bot Auto Claim Shooping Mall\n";
        echo "Nomor : ";
        $nohp = trim(fgets(STDIN));
	echo "Password : ";
	$pwd = trim(fgets(STDIN));

		$masuk = login($nohp, $pwd);
		$gasmasuk = json_decode($masuk, TRUE);
		$token = $gasmasuk["data"]["token"];
		$login = $gasmasuk["msg"];
	echo "[+] $login\n";
	echo "[+] Token : $token\n";

 for ($x=0; $x <= 22; $x++) {
		$klaimklik = klaim($token);
		$klik = json_decode($klaimklik, TRUE);
		$orderid = $klik["data"]["orderid"];
		$hanjer = gaskuy($token, $orderid);
		$jsonconfirm = json_decode($hanjer, TRUE);
		$confirm = $jsonconfirm["msg"];
	echo "[+] $confirm\n";
		$jatah = result($token);
		$mmk = json_decode($jatah, TRUE);
		$komisi = $mmk["data"]["commission"];
	echo "[+] Commission : $komisi\n";

	sleep(2);
}

function login($nohp, $pwd){
    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.shopping89.com/api/login/login");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   	    curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, '{"username":"'.$nohp.'","password":"'.$pwd.'","devicetype":"","version":""}');
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		$headers = array();
  		$headers[] = "Host: api.shopping89.com";
		$headers[] = "language: ina-BA";
  		$headers[] = "Accept-Language: en-us";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
		$headers[] = "Content-Type: application/json";
		$headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1";		
		curl_setopt($ch , CURLOPT_HTTPHEADER ,$headers); 
		$hasil = curl_exec($ch);
			return $hasil;

}         
	


function klaim($token){
    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.shopping89.com/api/order/mkorder");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   	    curl_setopt($ch, CURLOPT_POST, 1);
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		$headers = array();
  		$headers[] = "Host: api.shopping89.com";
		$headers[] = "language: ina-BA";
  		$headers[] = "Accept-Language: en-us";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
  		$headers[] = "token: '.$token.'";
		$headers[] = "Content-Type: application/json";
		$headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1";		
		curl_setopt($ch , CURLOPT_HTTPHEADER ,$headers); 
		$hasil = curl_exec($ch);
			return $hasil;

}  

                  
function gaskuy($token, $orderid){
    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.shopping89.com/api/order/confirm");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   	    curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, '{"orderid":"'.$orderid.'","status":1}');
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		$headers = array();
  		$headers[] = "Host: api.shopping89.com";
		$headers[] = "language: ina-BA";
  		$headers[] = "Accept-Language: en-us";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
  		$headers[] = "token: '.$token.'";
		$headers[] = "Content-Type: application/json";
		$headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1";		
		curl_setopt($ch , CURLOPT_HTTPHEADER ,$headers); 
		$hasil = curl_exec($ch);
			return $hasil;

}  




function result($token){
    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.shopping89.com/api/account/getUserInfo");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   	    curl_setopt($ch, CURLOPT_POST, 1);  	
  		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
		$headers = array();
  		$headers[] = "Host: api.shopping89.com";
		$headers[] = "language: ina-BA";
  		$headers[] = "Accept-Language: en-us";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
  		$headers[] = "token: '.$token.'";
		$headers[] = "Content-Type: application/json";
		$headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1";		
		curl_setopt($ch , CURLOPT_HTTPHEADER ,$headers); 
		$hasil = curl_exec($ch);
			return $hasil;

}  
