<!-- shopping cart-->
<div class="grid_cart">
  <section class="webshop_cart">
    <form action="index.php?page=cart" method="POST">
      <h1 class="header_title">Jouw Winkelmandje</h1>
      <h2><a class="title_red" href="index.php">Verder winkelen</a></h2>
      <div class="cart_navigation">
        <div class="cart_nav--step crumb process_active">
          <p class="process_title--first">1. Winkelmandje</p>
        </div>
        <div class="cart_nav--step crumb">
          <p class="process_title">2. Informatie</p>
        </div>
        <div class="cart_nav--step crumb">
          <p class="process_title">3. Verzenden</p>
        </div>
        <div class="cart_nav--step">
          <p class="process_title">4. Betalen</p>
        </div>
      </div>

      <?php if (!empty($order)) { ?>
        <div class="basket">
          <div class="basket_grid">
            <p class="basket_heading--first">Product</p>
            <p class="basket_heading basket_heading--price">Prijs</p>
            <p class="basket_heading">Aantal</p>
            <p class="basket_heading">Subtotaal</p>
            <img class="basket_line" src="./assets/img/icons/line.png" alt="line">


            <?php
            $totalprice = 0;
            foreach ($order as $orderline) :
              $subtotal = $orderline['quantity'] * $orderline['price'];
              $totalprice += $subtotal;
            ?>
              <div class="basket_img"><img src="<?php echo $orderline['thumbnail_url'] ?>" alt="product image"></div>
              <div class="basket_prd--info">
                <p class="basket_prd_title"><?php echo $orderline['name'] ?></p>
                <p><?php echo $orderline['description_long'] ?></p>
              </div>
              <p class="basket_prd-price"><?php echo $orderline['price'] ?></p>
              <div class="basket_prd--qty">
                <input type="number" name="quantity[<?php echo $orderline['id'] ?>]" min="1" max="50" value="<?php echo $orderline['quantity'] ?>">
              </div>
              <p class="basket_prd--subtot"><?php echo $subtotal; ?></p>
              <button type="submit" name="delete" value="<?php echo $orderline['id'] ?>" class="basket_prd--delete">X Verwijder</button>
              <img class="basket_line2" src="./assets/img/icons/line.png" alt="line">
            <?php endforeach; ?>

            <p class="basket_total">Totaal</p>
            <p class="basket_total--price"><?php echo $totalprice; ?></p>
          </div>
        </div>
        <div class="cart_buttons">
          <button class="btn-update" type="submit" name="action" value="update">Update winkelmandje</button>
          <!-- <a href="index.php?page=order"></a> -->
          <button class="btn-bestellen" type="submit" name="action" value="bestellen">Bestellen <span class="cart_white"></span></button>
        </div>
      <?php } ?>
    </form>
  </section>
</div>
