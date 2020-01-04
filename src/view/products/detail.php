<!-- detail page product -->

<section>
  <header>
    <h1>Terug naar webshop</h1>
  </header>
</section>


<section>
  <h2></h2>
  <div>
    <?php echo '<img src="' . $product_image['image'] . '" alt="' . $product['name'] . '" />'; ?>
  </div>
  <div>
    <ul>
      <li><a href=""></a> Humo</li>
      <li><a href=""></a> Webshop</li>
      <li><a href=""></a> Boeken</li>
      <li><a href=""></a> Neuromancer</li>
    </ul>
  </div>
  <div>
    <p class="categorie"><?php echo $product['categorie']; ?></p>
  </div>
  <div>
    <p class="product-title"><?php echo $product['name']; ?></p>
  </div>
  <div>
    <p class="price"><?php echo money_format("%i", $product['price']); ?></p>
  </div>
  <div class="product-description"><?php echo $product['description']; ?></div>
  <div>
    <p><?php echo $product['detail']; ?></p>
  </div>
  <div>
    <form method="post" action="index.php?page=cart">
      <input type="number" name="quantity" min="1" max="5">
      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
      <button class="btn-add" type="submit" name="action" value="add"></button>
    </form>
  </div>
  <div>
    <p>Leer het boek kennen voordat je het aankoopt.</p>
    <p><a href="index.html"></a>Naar boekpagina</p>
  </div>
</section>
