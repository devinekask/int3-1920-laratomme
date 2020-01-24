<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <title>Webshop Humo</title>
  <?php echo $css; ?>
</head>

<body>

  <div class="layout">
    <?php if ($this->route['controller'] != 'Longread') {
    ?>
      <header class="header">
        <div class="width_content">
          <div class="hamburger_icon">
            <input type="checkbox">
            <img src="./assets/img/icons/hamburger.svg" alt="hamburger menu icon">
          </div>
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
            <li class="cart_items"><a class="cart_items" href="index.php?page=cart"><?php echo (!empty($_SESSION['order']['ordercount']) ? $_SESSION['order']['ordercount'] : 0); ?> Item(s)<img src="./assets/img/icons/cart_icon.svg" alt="cart_icon"></a></li>
          </ul>
        </div>
      </header>

    <?php } else { ?>

      <header id="#top" class="header_longread">
        <div class="header_bkg">
          <div class="logo_humo_longread">
            <img src="./assets/img/humo_logo.svg" alt="Humo logo">
          </div>

          <input class="hamburger_longread" type="checkbox" id="hamburger_longread">
          <label class="hamburger_bars" for="hamburger_longread">
            <div class="hamburgerbar bar1"></div>
            <div class="hamburgerbar bar2"></div>
            <div class="hamburgerbar bar3"></div>
          </label>


          <div class="longread_menu">
            <ul>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=cyberspace#cyberspace"><?php echo $data['intro']; ?></a></li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=auteur#auteur">De Auteur - <?php echo $data['author']; ?></a> </li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=boek#boek">Het boek - <?php echo $data['book']; ?></a> </li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=preview#preview"> Preview</a></li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=awards#awards"> Gewonnen awards</a></li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=recensies#recensies"> Recensies </a></li>
              <li><a href="index.php?page=<?php echo $_GET['page'] . '&id=' . $_GET['id']; ?>?menu=verhaal#verhaal">Het verhaal</a></li>
            </ul>
            <div class="longread_menu_bottom">
              <a href="index.php?page=detail&id=<?php echo $_GET['id']; ?>"><span class="arrow_white_right"></span>Terug naar webshop</a>
            </div>
            <div class="text_side menu_side">
              <img src="./assets/img/text_side/menu_text.svg" alt="Menu outlined text">
            </div>
          </div>
        </div>
      </header>

    <?php } ?>

    <?php if (!empty($_SESSION['info'])) { ?>
      <section class="info_box">
        <p><?php echo $_SESSION['info'] ?></p>
      </section>
    <?php } ?>

    <?php if (!empty($_SESSION['error'])) { ?>
      <section class="error_box">
        <p><?php echo $_SESSION['error'] ?></p>
      </section>
    <?php } ?>

    <main class="main">
      <?php echo $content; ?>
    </main>

    <?php if ($this->route['controller'] != 'Longread') {
    ?>
      <footer class="footer">
        <div class="width_content flex_footer">
          <div>
            <p class="footer_item_small_uppercase">Neem een abonnement</p>
            <ul>
              <li class="footer_item">Privacybeleid</li>
              <li class="footer_item">Wedstrijdregelement</li>
              <li class="footer_item">Adverteren</li>
              <li class="footer_item">Gebruiksvoorwaarden</li>
              <li class="footer_item_small">Cookiebeleid</li>
              <li class="footer_item">Cookie instellingen</li>
              <li class="footer_item_small">Contact</li>
              <li class="footer_item_small">Colofon</li>
            </ul>
          </div>
          <div class="footer_second_row">
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

    <?php } else { ?>

      <footer class="footer_longread">
        <div class="container">
          <p class="footer_longread_title"><?php echo $data['book'] . ' - ' . $data['author']; ?></p>
          <div class="footer_longread_links">
            <a class="footer_longread_link" href="index.php?page=detail&id=<?php echo $_GET['id']; ?>"><span class="arrow_white_left"></span> Terug naar webshop</a>
            <a class="footer_longread_link" href="#top">Terug naar boven <span class="arrow_white_up"></span></a>
          </div>
        </div>
      </footer>
    <?php } ?>
  </div>
  <?php echo $js; ?>

</body>

</html>
