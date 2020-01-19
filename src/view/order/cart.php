<!-- shopping cart-->
<div class="grid_cart">
  <section class="webshop_cart">
    <h1 class="header_title">Jouw Winkelmandje</h1>
    <h2><a class="title_red" href="index.php">Verder winkelen</a></h2>
    <div class="cart_navigation">
      <div class="cart_nav--step crumb <?php echo (empty($_POST['action']) || $_POST['action'] === 'cart') ? 'process_active' : '' ?>">
        <p class="process_title--first">1. Winkelmandje</p>
      </div>
      <div class="cart_nav--step crumb<?php echo (!empty($_POST['action']) && $_POST['action'] === 'information') ? 'process_active' : '' ?>">
        <p class="process_title">2. Informatie</p>
      </div>
      <div class="cart_nav--step crumb <?php echo (!empty($_POST['action']) && $_POST['action'] === 'shipping') ? 'process_active' : '' ?>">
        <p class="process_title">3. Verzenden</p>
      </div>
      <div class="cart_nav--step<?php echo (!empty($_POST['action']) && $_POST['action'] === 'payment') ? 'process_active' : '' ?>">
        <p class="process_title">4. Betalen</p>
      </div>
    </div>
    <div class="basket">
      <div class="basket_grid">
        <p class="basket_heading--first">Product</p>
        <p class="basket_heading basket_heading--price">Prijs</p>
        <p class="basket_heading">Aantal</p>
        <p class="basket_heading">Subtotaal</p>
        <img class="basket_line" src="./assets/img/icons/line.png" alt="line">
        <div class="basket_img"><img src="" alt="product image"></div>
        <div class="basket_prd--info">
          <p class="basket_prd_title">Product naam</p>
          <p>Product beschrijving</p>
        </div>
        <p class="basket_prd-price">Prijs</p>
        <div class="basket_prd--qty">
          <input type="number" name="quantity" min="1" max="50" value="">
          <input type="hidden" name="product_id" value="id" />
        </div>
        <p class="basket_prd--subtot">subtotaal</p>
        <p class="basket_prd--delete">X Verwijder</p>
        <img class="basket_line2" src="./assets/img/icons/line.png" alt="line">
        <p class="basket_total">Totaal</p>
        <p class="basket_total--price">Totaalprijs</p>
      </div>
    </div>
    <div class="cart_buttons">
      <button class="btn-update" type="submit" name="action" value="update">Update winkelmandje</button>
      <!-- <a href="index.php?page=order"></a> -->
      <button class="btn-bestellen" type="submit" name="action" value="bestellen">Bestellen <span class="cart_white"></span></button>
    </div>
  </section>
</div>
