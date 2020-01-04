<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Humo Webshop</title>
  <?php /* NEW */ ?>
  <?php echo $css; ?>
</head>

<body>
  <header>
    <!-- Humo logo -->
    <h1 class="header-logo">HUMO</h1>
    <nav>
      <ul>
        <li>Home</li>
        <li>Actua</li>
        <li>Humor</li>
        <li>Tv/Film</li>
        <li>Muziek</li>
        <li>Boeken</li>
        <li>Webshop</li>
        <!-- link to cart with number of items in cart -->
        <li><a href=""></a><?php echo $numItems; ?>Item(s)</li>
      </ul>
    </nav>
  </header>

  <main>
    <?php
    if (!empty($_SESSION['error'])) {
      echo '<div class="error box">' . $_SESSION['error'] . '</div>';
    }
    if (!empty($_SESSION['info'])) {
      echo '<div class="info box">' . $_SESSION['info'] . '</div>';
    }
    ?>
    <header>
      <h1>Humo Webshop - <?php echo $title; ?></h1>
    </header>
    <?php echo $content; ?>
  </main>

  <?php echo $js; ?>

  <footer>
    <ul>
      <li>Webshop
        <ul>
          <li>Humo</li>
          <li>Boeken</li>
          <li>Boek toebehoren</li>
        </ul>
      </li>
      <li>Winkelmandje</li>
      <li>Humo</li>

    </ul>
  </footer>

</body>

</html>
