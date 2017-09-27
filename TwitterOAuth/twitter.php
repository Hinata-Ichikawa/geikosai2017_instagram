<?php
require_once("twitteroauth/twitteroauth.php");
  
$consumerKey = "nvBub5pSL1PGFOadgsLbcsvGw";
$consumerSecret = "kzaZ4ekv8fEUvtWBJrDxdscWdZstgt0sOAZWIQGYp4VFcLkllC";
$accessToken = "706720696173334528-7KuNl6KxP1429sY9slZNa6gcS23YMFR";
$accessTokenSecret = "rsIXMZKnjQrUhy6HOL3Z2wiwVoczLSIIu8SvPCfSBNzND";
  
$twObj = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);
$req = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("count"=>"10"));
$tw_arr = json_decode($req);
 
if (isset($tw_arr)) {
    foreach ($tw_arr as $key => $val) {
        echo $tw_arr[$key]->text;
        echo date('Y-m-d H:i:s', strtotime($tw_arr[$key]->created_at));
        echo '<br>';
    }
} else {
    echo 'つぶやきはありません。';
}