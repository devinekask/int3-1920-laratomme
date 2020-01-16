<!-- detail page product -->
<section class="towebshop">
  <h1><a href="index.php">Terug naar webshop</a></h1>
</section>

<section class="product_content">
  <h2></h2>
  <div class="product_image--productpage">
    <?php echo '<img src="' . $product_image['image'] . '" alt="' . $product['name'] . '" />'; ?>
  </div>
  <div class="productpage_crumbs">
    <ul>
      <li class="crumb"><a href="index.php"></a>Webshop</li>
      <li class="crumb"><a href="index.php#boeken"></a> Boeken</li>
      <li><a href=""></a><?php echo $product['name']; ?></li>
    </ul>
  </div>
  <div class="product_information">
    <p class="categorie"><?php echo $product['categorie']; ?></p>
    <p class="product-title"><?php echo $product['name']; ?></p>
    <p class="price"><?php echo money_format("%i", $product['price']); ?></p>
    <p class="product-description"><?php echo $product['description']; ?></p>
    <p><?php echo $product['detail']; ?></p>
  </div>
  <div class="product_buy">
    <form method="post" action="index.php?page=cart">
      <input type="number" name="quantity" min="1" max="50">
      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
      <button class="btn-add" type="submit" name="action" value="add"></button>
    </form>
  </div>
  <div>
    <p>Leer het boek kennen voordat je het aankoopt.</p>
    <p><a href="book.html"></a>Naar boekpagina</p>
  </div>
</section>
<section class="otherproducts">
  <div>
    <h2>Dit interesseert u misschien ook:</h2>
  </div>
  <div>
    <div class="product">
      <?php foreach ($products as $product) : ?>
        <div>
          <!-- <?php echo '<img src="' . $productImage['image'] . '" alt="' . $product['name'] . '" />'; ?> -->
        </div>
        <p class="product-title"><?php echo $product['name']; ?></p>
        <div>
          <p class="categorie"><?php echo $product['categorie']; ?></p>
        </div>
        <div>
          <p class="price"><?php echo money_format("%i", $product['price']); ?></p>
        </div>
        <div>
          <form method="post" action="index.php?page=cart">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
            <button class="btn-add" type="submit" name="action" value="add"></button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
