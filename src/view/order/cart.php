<!-- shopping cart-->
<div class="grid_cart">
  <section class="webshop_cart">
    <h1 class="header_title">Jouw Winkelmandje</h1>
    <h2><a class="title_red" href="index.php">Verder winkelen</a></h2>
    <div class="cart_navigation">
      <div class="cart_nav--step crumb <?php echo (empty($_POST['action']) || $_POST['action'] === 'cart') ? 'process_active' : '' ?>">
        <p class="process_title">Winkelmandje</p>
      </div>
      <div class="cart_nav--step crumb<?php echo (!empty($_POST['action']) && $_POST['action'] === 'information') ? 'process_active' : '' ?>">
        <p class="process_title">Informatie</p>
      </div>
      <div class="cart_nav--step crumb <?php echo (!empty($_POST['action']) && $_POST['action'] === 'shipping') ? 'process_active' : '' ?>">
        <p class="process_title">Verzenden</p>
      </div>
      <div class="cart_nav--step<?php echo (!empty($_POST['action']) && $_POST['action'] === 'payment') ? 'process_active' : '' ?>">
        <p class="process_title">Betalen</p>
      </div>
    </div>
    <div class="basket">
      <div class="basket_grid">
        <p class="basket_heading--first">Product</p>
        <p class="basket_heading basket_heading--price">Prijs</p>
        <p class="basket_heading">Aantal</p>
        <p class="basket_heading">Subtotaal</p>
        <div class="basket_img"><img src="" alt="product image"></div>
        <div class="basket_prd--info">
          <p>product</p>
          <p>product beschrijving</p>
        </div>
        <p class="basket_prd-price">Prijs</p>
        <div class="basket_prd--qty">
          <input type="number" name="quantity" min="1" max="50">
          <input type="hidden" name="product_id" value="id" />
        </div>
        <p class="basket_prd--subtot">subtotaal</p>
        <p class="basket_prd--delete">verwijder</p>
        <p class="basket_total">Totaal</p>
        <p class="basket_total--price">totaalprijs</p>
      </div>
    </div>
    <div class="cart_buttons">
      <button class="btn-update" type="submit" name="action" value="update">Update winkelmandje</button>
      <button class="btn-red btn-bestellen" type="submit" name="action" value="bestellen">Bestellen</button>
    </div>
  </section>
</div>
