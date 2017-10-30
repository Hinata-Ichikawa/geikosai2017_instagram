<?php

$consumerKey = "nvBub5pSL1PGFOadgsLbcsvGw";
$consumerSecret = "kzaZ4ekv8fEUvtWBJrDxdscWdZstgt0sOAZWIQGYp4VFcLkllC";
$accessToken = "706720696173334528-7KuNl6KxP1429sY9slZNa6gcS23YMFR";
$accessTokenSecret = "rsIXMZKnjQrUhy6HOL3Z2wiwVoczLSIIu8SvPCfSBNzND";

$connection = new \TwistOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$images_array = array();
$url_array = array();

// ハッシュタグによるツイート検索
$hash_params = array('q' => '#芸工祭2017' ,'count' => '100', 'lang'=>'ja', "result_type"=>"recent");
$hash = $connection->get('search/tweets', $hash_params)->statuses;

foreach ($hash as $value) {
  // echo "<pre>";
  // print_r($value);
  // echo "</pre>";
  //ツイート内容
  $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false);


  if (isset($value->extended_entities->media)){
    //RTではないか
    $text_top =  mb_substr($text, 0, 2);
    if($text_top != 'RT'){
      foreach($value->extended_entities->media as $key => $media) {

        if (isset($value->extended_entities->media[$key])) {
          // iamge
          $image = $value->extended_entities->media[$key]->media_url;

          // icon image
          $icon_url = $value->user->profile_image_url;

          // username
          $screen_name = $value->user->screen_name;

          // 投稿日
          $updated = date('Y/m/d H:i', strtotime($value->created_at));

          // 投稿者のID
          $tweet_id = $value->id_str;

          // twitterの投稿URL
          $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;

          array_push($images_array, $image);
          array_push($url_array, $url);
        }
      }
    }
  }
}

?>
