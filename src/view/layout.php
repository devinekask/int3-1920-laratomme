<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <title>Webshop Humo</title>
  <?php echo $css; ?>
</head>

<body class="layout">

  <header class="header">
    <div class="width_content">
      <ul>
        <li class="menu_item">Home</li>
        <li class="menu_item">Actua</li>
        <li class="menu_item">Humor</li>
        <li class="menu_item">Tv/Film</li>
      </ul>
      <img class="logo_humo" src="./assets/img/humo_logo.svg" alt="logo_humo">
      <ul>
        <li class="menu_item">Muziek</li>
        <li class="menu_item">Boeken</li>
        <li class="menu_item"><a class="shop_link" href="index.php">Webshop</a></li>
        <li class="cart_items"><a class="cart_items" href="index.php?page=cart">Item(s)<img src="./assets/img/icons/cart_icon.svg" alt="cart_icon"></a></li>
      </ul>
    </div>
  </header>

  <?php
  if (!empty($_SESSION['error'])) {
    echo '<div class="error box">' . $_SESSION['error'] . '</div>';
  }
  if (!empty($_SESSION['info'])) {
    echo '<div class="info box">' . $_SESSION['info'] . '</div>';
  }
  ?>

  <main class="main">
    <?php echo $content; ?>
  </main>

  <footer class="footer">
    <div class="width_content flex_footer">
      <div>
        <ul>
          <li>Privacybeleid</li>
          <li>Wedstrijdregelement</li>
          <li>Adverteren</li>
          <li>Gebruiksvoorwaarden</li>
          <li>Cookiebeleid</li>
          <li>Cookie instellingen</li>
          <li>Contact</li>
          <li>Colofon</li>
        </ul>
      </div>
      <div>
        <ul>
          <div class="flex">
            <li><img src="./assets/img/logo/dpg-media.png" alt="dpg_logo"></li>
            <li>2019 DPG Media</li>
          </div>
          <div class="flex">
            <li><a href="https://www.facebook.com/v2.3/plugins/error/confirm/like?iframe_referer=https%3A%2F%2Fwww.humo.be%2F&kid_directed_site=false&secure=true&plugin=like&return_params=%7B%22app_id%22%3A%22106372110779%22%2C%22channel%22%3A%22https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D45%23cb%3Df2322009cf9a6f%26domain%3Dwww.humo.be%26origin%3Dhttps%253A%252F%252Fwww.humo.be%252Ff32e0c91df8e778%26relation%3Dparent.parent%22%2C%22color_scheme%22%3A%22dark%22%2C%22container_width%22%3A%220%22%2C%22font%22%3A%22tahoma%22%2C%22href%22%3A%22https%3A%2F%2Fwww.facebook.com%2Fhumo.be%22%2C%22layout%22%3A%22button_count%22%2C%22locale%22%3A%22nl_NL%22%2C%22sdk%22%3A%22joey%22%2C%22send%22%3A%22false%22%2C%22show_faces%22%3A%22false%22%2C%22ret%22%3A%22sentry%22%2C%22act%22%3A%22like%22%7D">
                <img src="./assets/img/logo/fb.png" alt="vindikleuk_fb_link"></a></li>
          </div>
          <div class="flex">
            <li><img src="./assets/img/logo/logo_jep.png" alt="jep_logo"></li>
            <li><img src="./assets/img/logo/Raad-voor-de-Journalistiek.png" alt="raadvoorjournalistiek_logo"></li>
            <li><img src="./assets/img/logo/cim_internet.png" alt="cim_logo"></li>
          </div>
        </ul>
      </div>
    </div>
  </footer>

  <?php echo $js; ?>

</body>

</html>
