<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webshop Humo</title>
  <?php echo $css; ?>
</head>

<body>
  <div class="page">
    <header class="header">

      <!-- Insert logo Humo -->
      <h1 class="hidden">Webshop Humo</h1>
      <img class="logo_humo" src="./src/assets/logo_humo" alt="logo_humo">
      <div class="navigation_main">
        <nav>
          <ul>
            <li>Home</li>
            <li>Actua</li>
            <li>Humor</li>
            <li>Tv/Film</li>
            <li>Muziek</li>
            <li>Boeken</li>
            <li><a href="index.php">Webshop</a></li>
            <li><a href="index.php?page=cart"><?php echo $numItems; ?>Item(s)<img src="./src/assets/cart_icon" alt="cart_icon"></a></li>
          </ul>
        </nav>
      </div>

      <?php
      if (!empty($_SESSION['error'])) {
        echo '<div class="error box">' . $_SESSION['error'] . '</div>';
      }
      if (!empty($_SESSION['info'])) {
        echo '<div class="info box">' . $_SESSION['info'] . '</div>';
      }
      ?>

    </header>

    <main>
      <?php echo $content; ?>
    </main>

    <footer class="footer">
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
          <li><img src="" alt="dpg_logo"></li>
          <li>2019 DPG Media</li>
          <li><a href="https://www.facebook.com/v2.3/plugins/error/confirm/like?iframe_referer=https%3A%2F%2Fwww.humo.be%2F&kid_directed_site=false&secure=true&plugin=like&return_params=%7B%22app_id%22%3A%22106372110779%22%2C%22channel%22%3A%22https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D45%23cb%3Df2322009cf9a6f%26domain%3Dwww.humo.be%26origin%3Dhttps%253A%252F%252Fwww.humo.be%252Ff32e0c91df8e778%26relation%3Dparent.parent%22%2C%22color_scheme%22%3A%22dark%22%2C%22container_width%22%3A%220%22%2C%22font%22%3A%22tahoma%22%2C%22href%22%3A%22https%3A%2F%2Fwww.facebook.com%2Fhumo.be%22%2C%22layout%22%3A%22button_count%22%2C%22locale%22%3A%22nl_NL%22%2C%22sdk%22%3A%22joey%22%2C%22send%22%3A%22false%22%2C%22show_faces%22%3A%22false%22%2C%22ret%22%3A%22sentry%22%2C%22act%22%3A%22like%22%7D">
              <img src="" alt="vindikleuk_fb_link"></a></li>
          <li><img src="" alt="jep_logo"></li>
          <li><img src="" alt="raadvoorjournalistiek_logo"></li>
          <li><img src="" alt="cim_logo"></li>
        </ul>
      </div>
    </footer>

  </div>
  <?php echo $js; ?>
</body>

</html>
