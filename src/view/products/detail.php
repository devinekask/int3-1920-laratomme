<!-- detail page product -->
<section class="towebshop">
  <h1><a class="title_red" href="index.php">Terug naar webshop</a></h1>
</section>

<section class="product_content">
  <h2 class="hidden">Producten</h2>
  <div class="product_image--productpage">
    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" />
  </div>
  <div class="productpage_crumbs">
    <ul>
      <li class="crumb">Webshop</li>
      <li class="crumb"><?php echo $product['categorie']; ?></li>
      <li><?php echo $product['name']; ?></li>
    </ul>
  </div>
  <div class="product_information">
    <p class="categorie"><?php echo $product['categorie']; ?></p>
    <p class="product-title"><?php echo $product['name']; ?></p>
    <p class="price"><?php echo ($product['price']); ?></p>
    <p class="product-description"><?php echo $product['description_long']; ?></p>
    <!-- <p>//<?php echo $product['detail']; ?></p> -->
  </div>
  <div class="product_buy">
    <form method="post" action="index.php?page=cart">
      <input type="number" name="quantity" min="1" max="50">
      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
      <button class="btn-add--text btn-red" type="submit" name="action" value="add">Toevoegen aan winkelmandje</button>
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
      <?php foreach ($similarproducts as $similarproduct) : ?>
        <div>
          <a href="index.php?page=detail&id=<?php echo $similarproduct['id']; ?>">
            <img src="<?php echo $similarproduct['thumbnail_url']; ?>" alt="<?php echo $similarproduct['name']; ?>" />
          </a>
        </div>
        <p class="product-title"><?php echo $similarproduct['name']; ?></p>
        <div>
          <p class="categorie"><?php echo $similarproduct['categorie']; ?></p>
        </div>
        <div>
          <p class="price"><?php echo ($similarproduct['price']); ?></p>
        </div>
        <div>
          <form method="post" action="index.php?page=cart">
            <input type="hidden" name="product_id" value="<?php echo $similarproduct['id']; ?>" />
            <button class="btn-add" type="submit" name="action" value="add">+</button>
          </form>
        </div>
        <div>
          <p><a href="index.php?page=detail&id=<?php echo $similarproduct['id']; ?>">Bekijk product</a> </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
