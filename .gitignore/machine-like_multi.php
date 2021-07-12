<?php 
error_reporting(0);
$url = array("http://www.machine-liker.com/login/","http://www.machine-liker.com/auth/verify-login/","http://www.machine-liker.com/api/find-post-id/");
$tach = array("<a href=",'"','"https://www.facebook.com');
$trim = array('$v = trim(fgets(STDIN));','$choose = trim(fgets(STDIN));','$post = trim(fgets(STDIN));','$post_viplike = trim(fgets(STDIN));','$file = trim(fgets(STDIN));','$file_input = trim(fgets(STDIN));');
$hoi = array("Mã: ","Enter để xác nhận: ","Cookie : ","Bạn có 20s để very","
Choose Reaction
1. Like 
2. Love 
3. Haha
4. Wow 
5. Sad 
6. Angry 
7. All
Chooose: 
","URL Post: ","ID: ","Có : ");
$access = login_machine($url[0]);
$hoadeptrai = html_entity_decode($access); 
$link_allow = explode($tach[0],$hoadeptrai);
$link_very = explode($tach[1],$link_allow[8])[1];
$ma = explode("=",$link_very)[1];
system('clear');
print("$hoi[3] \n $hoi[0] $ma \n $hoi[1]");
eval($trim[0]);
system("termux-open $link_very");
system('clear');
sleep(10);
$very = very($url[1]);
$val = fopen("id_viplike.txt","w+");
if($very["status"] == "ok"){
  
  $id = $very["user"]["id"];
  $name = $very["user"]["name"];
  $url = $very["user"]["url"];
  system('clear');
  print("Name Facebook: $name / ID Account: $id\n");
  print("Input file txt nếu muốn buff list khác ghi ok, enter sẽ sử dụng bài viết acc chạy buff: ");
  eval($trim[4]);
  if($file == false){
  $vip_like = reaction_get_id();
  $h = explode($tach[2],$vip_like);
  $cout = count($h);
  for($v = 0;$v<=$cout;$v++){
    $cot = explode('"',$h[$v])[0];
    if(strpos($cot,"posts")){
      $post_so = $post_so + 1;
    }}
    print($hoi[7]."$post_so Bài Viết\n Nhập số post muốn buff: ");
    eval($trim[3]);
  for($v = 0;$v<=$post_viplike + 1;$v++){
    $cot = explode('"',$h[$v])[0];
    if(strpos($cot,"posts")){
      $z_shot = "https://www.facebook.com$cot";
      $get_post = find_id("http://www.machine-liker.com/api/find-post-id/",$z_shot);
      fwrite($val,"$get_post\n");
    }
  }}else{
    print("Input file: ");
    eval($trim[5]);
    $get_post = file_get_contents($file_input);
   fwrite($val,"$get_post\n");
  }
  print($hoi[4]);
  eval($trim[1]);
  
  if($choose == 1){
    $re = "1";
  }elseif($choose == 2){
    $re = "2";
  }elseif($choose == 3){
    $re = "4";
  }elseif($choose == 4){
    $re = "3";
  }elseif($choose == 5){
    $re = "7";
  }elseif($choose == 6){
    $re = "8";
  }else{
    $re = "1,2,4,3,7,8";
  }
  $s = 0;
  while(true){
  $data = file_get_contents("id_viplike.txt");
   $get = file("id_viplike.txt",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
  $stt_id = 0;
  $vip_like_cout = -1;
  for($v=0;$v<=count($get) - 1;$v++){
   $stt_id = $stt_id+1;
   $vip_like_cout = $vip_like_cout + 1;
  $get_post = $get[$vip_like_cout];
  $complete = send_rect("http://www.machine-liker.com/api/send-reactions/",$get_post,$re);
  $json = json_decode($complete,true);
  if($json["status"] == "ok"){
    $type = $json["info"]["type"];
    $mess = $json["info"]["message"];
    $tt = $json["info"]["next"];
    $s = $s+1;
    print("[".$s."]"."Post số $stt_id [$get_post] $type - $mess - $tt \n");
    for($v = 600;$v > 0;$v--){
      print("\r Delay $v sec..\r");
      sleep(1);
   }
 }else{
  print("\r Tiếp! \r");
  
  }
    
  }}
}else{
  print("Not working"); die();
}



function login_machine($link){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link);

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie_machine.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return($access);
}
function very($link_very){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_very);

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie_machine.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return(json_decode($access,true));
}
function send_rect($link_send,$post_id,$react){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_send);

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie_machine.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$data = array(
  "post_id" => $post_id,
  "reactions" => $react,
  "limit" => 100,
  );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return($access);
}
function find_id($link_id,$post_id){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $link_id);
$head[] = "Host: www.machine-liker.com";
$head[] = "Connection: keep-alive";
$head[] = "Content-Length: 119";
$head[] = "X-Requested-With: XMLHttpRequest";
$head[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$head[] = "Origin: http://www.machine-liker.com";
$head[] = "Referer: http://www.machine-liker.com/auto-reactions/";
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie_machine.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$data = array(
  "url" => $post_id,
  );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
$hi = json_decode($access,true);
$id = $hi["post"]["id"];
return $id;
}
function reaction_get_id(){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.machine-liker.com/auto-reactions/");

curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie_machine.txt");
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$access = curl_exec($ch);
curl_close($ch);
return($access);
}
