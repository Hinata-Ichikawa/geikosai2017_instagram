<?php   
ini_set("display_errors", On);  
error_reporting(E_ALL);  
?>  

<?php

require_once 'TwistOAuth.phar';

$consumerKey = "nvBub5pSL1PGFOadgsLbcsvGw";
$consumerSecret = "kzaZ4ekv8fEUvtWBJrDxdscWdZstgt0sOAZWIQGYp4VFcLkllC";
$accessToken = "706720696173334528-7KuNl6KxP1429sY9slZNa6gcS23YMFR";
$accessTokenSecret = "rsIXMZKnjQrUhy6HOL3Z2wiwVoczLSIIu8SvPCfSBNzND";
  
$connection = new TwistOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// ハッシュタグによるツイート検索
$hash_params = ['q' => '#芸工祭2017' ,'count' => '10', 'lang'=>'ja'];
$hash = $connection->get('search/tweets', $hash_params)->statuses;

foreach ($hash as $value) {
    $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false);
    // 検索キーワードをマーキング
    $keywords = preg_split('/,|\sOR\s/', $hash_params['q']); //配列化
    foreach ($keywords as $key) {
        $text = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $text);
    }
    // ツイート表示のHTML生成
    disp_tweet($value, $text);
}

function disp_tweet($value, $text){
    $icon_url = $value->user->profile_image_url;
    $screen_name = $value->user->screen_name;
    $updated = date('Y/m/d H:i', strtotime($value->created_at));
    $tweet_id = $value->id_str;
    $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;

    echo '<div class="tweetbox">' . PHP_EOL;
    echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
    echo '<div class="meta"><a target="_blank" href="' . $url . '">' . $updated . '</a>' . '<br>@' . $screen_name .'</div>' . PHP_EOL;
    echo '<div class="tweet">' . $text . '</div>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
}
?>