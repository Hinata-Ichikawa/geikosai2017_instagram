<?php require_once 'TwistOAuth.phar';?>
<?php require_once 'twitter.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>
  <title>芸工祭2017|TOP</title>
  <meta name="description" content="名古屋市立芸術工学部の大学祭、芸工祭の公式ホームページです。今年のテーマは「BombJoule」芸工生だけでなく芸工祭に参加してくれるみなさんも内に秘めたエネルギーを思い切り爆発させて新しい自分に出会い、全力で芸工祭を楽しんでほしい！そんな想いが込められています。">
  <link rel='stylesheet' type='text/css' href='css/ress.min.css'>
  <link rel='stylesheet' type='text/css' href='css/stylesheet.css'>

  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
  <script src="js/ofi.min.js"></script>
  <script>
  objectFitImages('img.object-fit-img');
</script>

</head>
<body>
  <header class="header">
    <h1 class="title">Bombjistagram</h1>
  </header>
  <div class="container">
    <div class="profile">
      <img class="profile-img" src="images/profile-img.png" alt="">
      <div class="profile-right">
      <h2 class="profile-name">#芸工祭2017</h2>
      <p>芸工祭のwebサイト => <a href="http://geikousai-ncu.com/">geikousai-ncu.com</a></p>
      <p>芸工祭の告知動画 => <a href="https://www.youtube.com/watch?v=T8UcWyatYIw">youtube.com</a></p>
      </div>
    </div>
    <div class="img-container">
      <?php foreach ($images_array as $key => $value) {?>
      <a href="<?php echo $url_array[$key]?>" target="_blank">
        <div class="img-box">
          <img class="object-fit-img" src="<?php echo $value; ?>" alt="">
        </div>
      </a>
      <?php }?>
    </div>
  </div>

</body>
</html>
