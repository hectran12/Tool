<?php
// Độ màu ở đây
// Code by Trần Trọng Hòa
$url = array(
  "http://www.ezylike.com/",
  "http://www.ezylike.com/index.php",
  "http://www.ezylike.com/index.php?page=module&md=youtube",
  "http://www.ezylike.com/system/modules/youtube/process.php",
  );
$text = array(
  "Tài khoản: ",
  "Mật khẩu: ",
  "Login Success",
  "Login Falied",
  "Coins: ",
  "Click All: ",
  "Money: ",
  "-",
  '$banner_job = "
  Url => $var_link
  Coins => $coins_watch
  Second => $sec
  "; ',
  '$success = "Success watch earn $coins_watch\n";',
  'Falied',
  'Your point: ',
  );
$trim = array(
  '$taikhoan=trim(fgets(STDIN));',
  '$matkhau=trim(fgets(STDIN));',
  '$var_link = $url[2]."?page=module&md=youtube&$code";',
  '
  for($v = $sec;$v > 0;$v--){
  print("\rDelay watch $v seconds!\r");
  sleep(1);
  }
  ',
  );
$phan_tach = array(
  '<span class="text-warning"><b>',
  '<',
  'class="text-white">',
  '$',
  '?page=module&md=youtube&',
  '"',
  '<b id="n_coins">',
  'var length = ',
  ';',
  );
print($text[0]); eval($trim[0]);
print($text[1]); eval($trim[1]);
$log = login_ezylike($taikhoan,$matkhau,$url[0]);
if(strpos($log,$taikhoan) == true){
print($text[2]);
sleep(2);
system('clear');
$home = main($url[1]);
$coin = explode($phan_tach[0],$home)[1];
$coins = explode($phan_tach[1],$coin)[0];
$click = explode($phan_tach[2],$home)[1];
$clicks = explode($phan_tach[1],$click)[0];
$money = explode($phan_tach[3],$home)[4];
$moneys = explode($phan_tach[1],$money)[0];
print($text[4].$coins."\n");
print($text[5].$clicks."\n");
print($text[6].$moneys."$phan_tach[3]\n");
for($v=0;$v<=25;$v++){ print($text[7]); }
print("\n");
$s = 0;
while(true){
for($v=0;$v<=25;$v++){ print($text[7]); }
print("\n");
$s++;
$extra_job = youtube($url[2]);
$jo = explode($phan_tach[4],$extra_job)[4];
$code = explode($phan_tach[5],$jo)[0];
eval($trim[2]);
$watch = xem($var_link);
$coins_wt = explode($phan_tach[6],$watch)[1];
$coins_watch = explode($phan_tach[1],$coins_wt)[0];
$secc = explode($phan_tach[7],$watch)[1];
$sec_1 = explode($phan_tach[8],$secc)[0];
$sec = explode(" ",$sec_1)[0];
eval($text[8]);
print("[$s]".$banner_job);
eval($trim[3]);
$trim_code = explode("=",$code)[1];
$resual = nhan($url[3],$trim_code);
print($resual."\n");
eval($text[9]);
if($resual == true){
  $coins = $coins + $resual;
  print($success.$text[11].$coins."\n");
  
}
else{ print("\r$text[10]\r"); }}
}else{
print($text[3]); die();
}
function login_ezylike($tk,$mk,$link_log){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_log);
$head[] = "Host: www.ezylike.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 42";
$head[] = "Cache-Control: max-age=0";
$head[] = "Upgrade-Insecure-Requests: 1";
$head[] = "Origin: http://www.ezylike.com";
$head[] = "Referer: http://www.ezylike.com/";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEJAR, "ezylike.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$data = array(
  "user" => $tk,
  "password" => $mk,
  "connect" => "",
  );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return $access;
}
function main($link_main){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_main);
$head[] = "Host: www.ezylike.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 42";
$head[] = "Cache-Control: max-age=0";
$head[] = "Upgrade-Insecure-Requests: 1";
$head[] = "Origin: http://www.ezylike.com";
$head[] = "Referer: http://www.ezylike.com/";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "ezylike.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return $access;
}
function xem($link_main){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_main);
$head[] = "Host: www.ezylike.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 42";
$head[] = "Cache-Control: max-age=0";
$head[] = "Upgrade-Insecure-Requests: 1";
$head[] = "Origin: http://www.ezylike.com";
$head[] = "Referer: http://www.ezylike.com/";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "ezylike.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return $access;
}
function youtube($link_main){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_main);
$head[] = "Host: www.ezylike.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 42";
$head[] = "Cache-Control: max-age=0";
$head[] = "Upgrade-Insecure-Requests: 1";
$head[] = "Origin: http://www.ezylike.com";
$head[] = "Referer: http://www.ezylike.com/";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "ezylike.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return $access;
}
function nhan($nhan,$code){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $nhan);
$head[] = "Host: www.ezylike.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 42";
$head[] = "Cache-Control: max-age=0";
$head[] = "Upgrade-Insecure-Requests: 1";
$head[] = "Origin: http://www.ezylike.com";
$head[] = "Referer: http://www.ezylike.com/";
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "ezylike.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$data = array(
  "data" => $code,
  );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return $access;
}
