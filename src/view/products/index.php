<!-- webshop all products page -->
<div class="grid_index">
  <section class="title_webshop">
    <h1 class="header_title">Webshop Humo</h1>
  </section>

  <section class="campaign">
    <div class="campaign_content">
      <div class="campaign_image">
        <picture>
          <source media="(max-width: 786px)" type="image/webp" srcset="./assets/img/boekencovers_small_result.webp" />
          <source srcset="./assets/img/boekencovers_result.webp" />
          <img src="./assets/img/boekencovers.jpg" alt="campaign_books_humo">
        </picture>

      </div>
      <div class="campaign_information">
        <div class="campaign_par">
          <h2>10 weken lang een Science Ficiton boek bij Humo!</h2>
          <p>Ontvang kortingsbon bij Humo en bestel je boek online via de webshop.</p>
          <p>Laat je meeslepen door Humo’s top 10 SF, met onder andere The Handmaids Tale en Neuromancer.</p>
        </div>
        <div class="arrow_moveout">
          <form action="index.php" method="POST">
            <p>
              <input type="hidden" name="categories[]" value="1">
              <button class="campaign_button" type="submit" name="action" value="filter">Bekijk boeken <span class="arrow_icon"></span></button></p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="content_webshop">
    <div class="wrapper_shop">
      <aside class="controls_webshop">
        <h3>Filters</h3>
        <form class="filter_function" method="POST" action="index.php">
          <div class="searchbox filter_item">
            <input name="search" class="searchinput" type="search" maxlength="512" aria-label="Search" placeholder="Zoek in shop..." value="<?php echo !empty($_SESSION['filter']['search']) ? $_SESSION['filter']['search'] : null; ?>">
            <span class="search_icon"></span>
          </div>
          <div class="filter_option filter_item">
            <p class="filter_red">Filter op prijs</p>
            <p>Prijs tot €<span class="price_chosen"><?php echo !empty($_SESSION['filter']['price']) ? $_SESSION['filter']['price'] : $maxprice; ?></span></p>
            <input id="price_range" name="price" type="range" min="1" max="<?php echo $maxprice; ?>" value="<?php echo !empty($_SESSION['filter']['price']) ? $_SESSION['filter']['price'] : $maxprice; ?>" class="slider" id="price">
          </div>
          <div class="filter_option filter_item">
            <p class="filter_red">Selecteer een categorie</p>
            <div class="categorie_options">
              <?php foreach ($categories as $categorie) : ?>
                <div>
                  <input id="categorie_<?php echo $categorie['id']; ?>" name="categories[]" value="<?php echo $categorie['id']; ?>" type="checkbox" <?php if (!empty($_SESSION['filter']['categories']) && in_array($categorie['id'], $_SESSION['filter']['categories'])) {
                                                                                                                                                      echo 'checked';
                                                                                                                                                    } ?>>
                  <label for="categorie_<?php echo $categorie['id']; ?>" class="checkbox"><?php echo $categorie['name']; ?></label>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="filter_submit filter_item">
            <button type="submit" name="action" value="filter">Filter<span class="arrow_white"></span></button>
          </div>
          <div>
            <button class="filter_reset" type="submit" name="action" value="reset_filter">Reset filter</button>
          </div>
        </form>
      </aside>

      <div class="products_webshop">
        <div class="products_list">
          <?php foreach ($products as $product) :
            if (!empty($product['variants'])) {
          ?>
              <div class="product">
                <div class="product_image">
                  <a href="index.php?page=detail&id=<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['thumbnail_url']; ?>" alt="<?php echo $product['name']; ?>" />
                  </a>
                </div>
                <div class="product_information--text">
                  <p class="categorie"><?php echo $product['categorie']; ?></p>
                  <a class="product_title" href="index.php?page=detail&id=<?php echo $product['id']; ?>">
                    <?php echo $product['name']; ?>
                  </a>
                  <form method="post" action="index.php">
                    <?php if (count($product['variants']) === 1) {
                      $variant = $product['variants'][0];
                    ?>
                      <input type="hidden" name="product_variant_id" value="<?php echo $variant['id']; ?>" />
                      <p class="variant_name"><?php echo $product['name'] != $variant['name'] ? $variant['name'] . " - " : "" ?><span class="price"><?php echo $variant['price']; ?></span></p>
                    <?php } else { ?>
                      <select name="product_variant_id"><?php foreach ($product['variants'] as $variant) : ?>
                          <option value="<?php echo $variant['id']; ?>" <?php echo $variant['is_default'] === 1 ? "selected" : "" ?>><?php echo $variant['name'] . " - " . $variant['price'] ?></option>
                        <?php endforeach; ?></select>
                    <?php } ?>
                    <button class="btn-add" type="submit" name="action" value="add">Toevoegen<span class="plus_icon">+</span></button>
                  </form>
                  <p><a class="bekijk" href="index.php?page=detail&id=<?php echo $product['id']; ?>">Bekijk product</a> </p>
                </div>
              </div>
          <?php }
          endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>
