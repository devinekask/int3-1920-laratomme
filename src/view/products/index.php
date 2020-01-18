<!-- webshop all products page -->
<section class="title_webshop">
  <h1 class="header_title">Webshop Humo</h1>
  <img src="/assets/img/dotted.png" alt="dotted line">
</section>

<section class="campaign">
  <div class="campaign_content">
    <div class="campaign_image">
      <img src="/assets/img/boekencovers.jpg" alt="campaign_books_humo">
    </div>
    <div class="campaign_information">
      <div>
        <h2>10 weken lang een Science Ficiton boek bij Humo!</h2>
        <p>Ontvang kortingsbon bij Humo en bestel je boek online via de webshop.</p>
        <p>Laat je meeslepen door Humo’s top 10 SF, met onder andere The Handmaids Tale en Neuromancer.</p>
      </div>
      <div class="arrow_moveout">
        <p><a class="campaign_button" href="">Bekijk boeken <span class="arrow_icon"></span></a></p>
        <!-- link naar boeken categorie in webshop -->
      </div>
    </div>
  </div>
</section>

<section class="content_webshop">
  <div class="wrapper_shop">
    <aside class="controls_webshop">
      <h3>Filters</h3>
      <form method="GET" action="index.php">
        <div class="searchbox filter_item">
          <input name="search" class="searchinput" type="search" maxlength="512" aria-label="Search" placeholder="Zoek in shop...">
          <span class="search_icon"></span>
        </div>
        <div class="filter_option filter_item">
          <p class="filter_red">Filter op prijs</p>
          <p>Prijs tot €60</p>
          <input name="price" type="range" min="1" max="100" value="50" class="slider" id="price">
        </div>
        <div class="filter_option filter_item">
          <p class="filter_red">Selecteer een categorie</p>
          <div class="categorie_options">
            <?php foreach ($categories as $categorie) : ?>
              <div>
                <input name="categories[]" value="<?php echo $categorie['id']; ?>" type="checkbox">
                <label for="<?php echo $categorie['id']; ?>" class="checkbox"><?php echo $categorie['name']; ?></label>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="filter_submit filter_item">
          <button type="submit" name="action" value="filter">Filter<span class="arrow_white"></span></button>
        </div>
      </form>
    </aside>

    <div class="products_webshop">
      <div class="refinements_webshop">
        <div class="filter_nav">
          <p>Alle producten</p>
          <!-- via js aangeven welke producten weergegeven worden -->
        </div>
        <div class="sort_webshop">
          <p>Sorteer op populariteit</p>
          <div>
            <ul>
              <li>Sorteer op recentheid</li>
              <li>Sorteer op populariteit</li>
              <li>Sorteer op prijs: laag > hoog</li>
              <li>Sorteer op prijs: hoog > laag</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="products_list">
        <?php foreach ($products as $product) : ?>
          <div class="product">
            <div class="product_image">
              <a href="index.php?page=detail&id=<?php echo $product['id']; ?>">
                <img src="<?php echo $product['thumbnail_url']; ?>" alt="<?php echo $product['name']; ?>" />
              </a>
            </div>
            <div class="product_information">
              <div>
                <p class="product-title"><?php echo $product['name']; ?></p>
                <!-- link naar detailpagina in naam en image -->
                <div>
                  <p class="categorie"><?php echo $product['categorie']; ?></p>
                </div>
                <div>
                  <p class="price"> <?php echo money_format("%i", $product['price']); ?></p>
                </div>
              </div>
              <div>
                <form method="post" action="index.php?page=cart">
                  <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
                  <button class="btn-add" type="submit" name="action" value="add">+</button>
                </form>
              </div>
            </div>
            <div>
              <p><a href="index.php?page=detail&id=<?php echo $product['id']; ?>">Bekijk product</a> </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
