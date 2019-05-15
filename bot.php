<?php

require("config.php");

function refil($ua, $ua1){
 $url = "https://goldcloudbluesky.com/campaigns";
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $ua1);
 $result = curl_exec($ch);
 curl_close($ch);
 $json = json_decode($result, true);
 $i = 0;
 while(True){
   if ($json["campaigns"]["internal"][$i]["campaign"] == null){
      break;
   }
   $js = json_encode(array("campaign" => $json["campaigns"]["internal"][$i]["campaign"], "network" => $json["campaigns"]["internal"][$i]["network"],"referralGoal" => "false"), true);
   $i++;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://goldcloudbluesky.com/campaigns/claim");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $js);
   $res = curl_exec($ch);
   curl_close($ch);
   $json1 = json_decode($res, true);
   if ($json1["title"] == true){
      continue;
   }else{
      echo "\033[1;32mYou Get\033[1;0m ".$json1["reward"]["amount"]." \033[1;32mSpin\033[1;31m => \033[1;0m".$json1["balance"]["spins"]."\033[1;32m Spin\n";
      sleep(5);
   }
 }
 while(True){
   if ($json["campaigns"]["networks"][$i]["campaign"] == null){
      echo "\033[1;33mTry To Spin..........!\n";
      break;
   }
   $js = json_encode(array("campaign" => $json["campaigns"]["networks"][$i]["campaign"], "network" => $json["campaigns"]["networks"][$i]["network"],"referralGoal" => "false"), true);
   $i++;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://goldcloudbluesky.com/campaigns/claim");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $js);
   $res = curl_exec($ch);
   curl_close($ch);
   $json1 = json_decode($res, true);
   if ($json1["title"] == true){
      continue;
   }else{
      echo "\033[1;32mYou Get\033[1;0m ".$json1["reward"]["amount"]." \033[1;32mSpin \033[1;31m=>\033[1;0m ".$json1["balance"]["spins"]."\033[1;32m Spin\n";
      sleep(5);
   }
 }
}

$banner = "\033[0;31m
         ####  #####  # #    # ###### #####
        #    # #    # # #   #  #        #
        #    # #    # # ####   #####    #
        #  # # #####  # #  #   #        #
        #   #  #   #  # #   #  #        #
         ### # #    # # #    # ######   #
\033[1;33m====================================================
\033[1;32mAuthor By  \033[1;31m:\033[1;0m Kadal15       \033[1;30m  | \033[1;32mBot Auto Spin APk
\033[1;32mChannel Yt \033[1;31m: \033[1;0mJejaka Tutorial \033[1;30m| \033[1;32mQriket


";

echo $banner;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://goldcloudbluesky.com/app/login");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("content-type: application/json; charset=UTF-8","device-type: Android","user-agent: okhttp/3.8.0"));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email" => $email,"password" => $password), true));
$result = curl_exec($ch);
curl_close($ch);
$jsn = json_decode($result, true);
if ($jsn["title"] == true){
   echo "\033[1;31mLogin ERROr\nPlease Check Your Email Or Password\n";
   exit();

}else{
  echo "\033[1;32mWelcome ".$jsn["account"]["user"]["firstName"]."".$jsn["account"]["user"]["lastName"]."\n";
  echo "\033[1;32mBallance \033[1;31m :\033[1;0m ".$jsn["account"]["balance"]["cash"]."\033[1;32m USD\n";
  echo "\033[1;32mSpin\033[1;31m      : \033[1;0m".$jsn["account"]["balance"]["spins"]."\n";
  echo "\033[1;32mReff Code\033[1;31m :\033[1;0m ".$jsn["account"]["user"]["referralCode"]."\n";
}
$url = "https://goldcloudbluesky.com/game";

$ua = array("accept: application/json",
"authorization: Bearer ".$jsn["auth"]["jwt"]["accessToken"],
"device-type: ".$jsn["account"]["user"]["os"],
"device-hardware: ".$jsn["account"]["user"]["device"],
"device-version: ",
"version: ".$jsn["account"]["user"]["version"],
"content-type: application/json; charset=UTF-8",
"user-agent: okhttp/3.8.0");

$ua1 = array("accept: application/json",
 "authorization: Bearer ".$jsn["auth"]["jwt"]["accessToken"],
 "device-type: ".$jsn["account"]["user"]["os"],
 "device-hardware: ",
 "device-version: ".$jsn["account"]["user"]["version"],
 "user-agent: okhttp/3.8.0");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://goldcloudbluesky.com/config/wheel");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
$result = curl_exec($ch);
curl_close($ch);
$j = json_decode($result, true);
$js = json_encode(array("configHash" => $j["hash"],
"selectedColor" => $collor,
"wager" => array("amount" => $amount,"type" => "spins")), true);
echo "\n\n\n\033[1;33mTry To Spin..........!\n";
$k = 0;
while(True){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $js);
  $result = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($result, true);
  if ($result == "Missing or invalid authentication token."){
     echo "\033[1;31mCannot authorization\n\033[1;33mPlease Check Your Config\n";
     exit();
  }if ($json["title"] == true){
    $k++;
    if ($k == 3){
      echo "\033[1;31mPlease Try Again Laters\n";
      exit();
    }
    echo "\033[1;31mYour Spin Is Empty...!\n\033[1;33mTry To Watch Ads.....!\n";
    refil($ua, $ua1);
  }else{
    if ($json["session"]["nextMove"]["secret"] == null){
      echo "\033[1;31mFiled To Get Reward\n";
      sleep(3);
      continue;
    }
  }

  $js1 = json_encode(array("GUID" => $json["session"]["GUID"],
  "secret" => $json["session"]["nextMove"]["secret"],
  "selectedColor" => "0"), true);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $js1);
  $res = curl_exec($ch);
  curl_close($ch);
  $json1 = json_decode($res, true);
  $js2 = json_encode(array("GUID" => $json1["session"]["GUID"],"secret" => $json1["session"]["nextMove"]["secret"]), true);
  if ($json1["session"]["continue"] == false){
     echo "\033[1;31mFiled To Get Reward\n";
     sleep(3);
     continue;
  }else{
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://goldcloudbluesky.com/game/claim");
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $js2);
     $respon = curl_exec($ch);
     curl_close($ch);
     $json3 = json_decode($respon, true);
     echo "\033[1;32mSuccess You Get \033[1;0m".$json3["prize"]["amount"]."\033[1;32m USD\033[1;30m | \033[1;32mBallance \033[1;0m".$json3["balance"]["cash"]." \033[1;32mUSD\n";
     sleep(5);
  }
}
