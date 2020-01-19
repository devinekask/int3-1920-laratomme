<!-- detail page product -->
<div class="grid_detail">
  <section class="towebshop">
    <h1><a class="title_red" href="index.php">Terug naar webshop</a></h1>
  </section>

  <section class="product_content">
    <h2 class="hidden">Producten</h2>
    <div class="product_image--productpage">
      <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" />
    </div>
    <div>
      <div>
        <ul class="productpage_crumbs">
          <li>Webshop</li>
          <li><?php echo $product['categorie']; ?></li>
          <li><?php echo $product['name']; ?></li>
        </ul>
      </div>
      <div class="product_information detail_product_part">
        <p class="detail_product--categorie"><?php echo $product['categorie']; ?></p>
        <p class="detail_product--title"><?php echo $product['name']; ?></p>
        <p class="detail_product--price price"><?php echo ($product['price']); ?></p>
        <p class="detail_product--description"><?php echo $product['description_long']; ?></p>
      </div>
      <div class="product_buy detail_product_part">
        <form method="post" action="index.php?page=detail&id=<?php echo $product['id']; ?>">
          <input type="number" name="quantity" min="1" max="50" value="1">
          <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
          <!-- <div class="btn_red--div"> -->
          <button class="btn-add--text btn_red" type="submit" name="action" value="add">Toevoegen aan winkelmandje<span class="cart_white"></span></button>
          <!-- </div> -->
        </form>
      </div>
      <div class="detail_product_part">
        <p class="boek_text--bolder">Leer het boek kennen voordat je het aankoopt.</p>
        <div class="arrow_moveout">
          <p><a class="button_bookpage" href="book.html">Naar boekpagina<span class="arrow_icon"></span></a></p>
        </div>
      </div>
    </div>
  </section>

  <section class="otherproducts">
    <div>
      <h2 class="header_title">Dit interesseert u misschien ook</h2>
    </div>
    <div class="otherproduct_list">
      <?php foreach ($similarproducts as $similarproduct) : ?>
        <div class="product">
          <div class="product_image">
            <a href=" index.php?page=detail&id=<?php echo $similarproduct['id']; ?>">
              <img src="<?php echo $similarproduct['thumbnail_url']; ?>" alt="<?php echo $similarproduct['name']; ?>" />
            </a>
          </div>
          <div class="product_information">
            <div class="product_information--text">
              <p class="categorie"><?php echo $similarproduct['categorie']; ?></p>
              <a class="product_title" href=" index.php?page=detail&id=<?php echo $similarproduct['id']; ?>">
                <?php echo $similarproduct['name']; ?>
              </a>
              <p class="price"><?php echo ($similarproduct['price']); ?></p>
            </div>
            <div>
              <form method="post" action="index.php?page=detail&id=<?php echo $product['id']; ?>">
                <input type="hidden" name="product_id" value="<?php echo $similarproduct['id']; ?>" />
                <input type="hidden" name="quantity" value="1" />
                <button class="btn-add" type="submit" name="action" value="add"><span>+</span></button>
              </form>
            </div>
          </div>
          <div>
            <p><a class="bekijk" href="index.php?page=detail&id=<?php echo $similarproduct['id']; ?>">Bekijk product</a> </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>
