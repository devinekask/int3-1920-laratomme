<!-- webshop all products page -->
<section class="title_webshop">
  <h1 class="header_title">Webshop Humo</h1>
</section>

<section class="campaign">
  <div class="campaign_content">
    <div class="campaign_image">
      <img src="" alt="campaign_books_humo">
    </div>
    <div class="campaign_information">
      <div>
        <h2>10 weken lang een Science Ficiton boek bij Humo!</h2>
        <p>Ontvang kortingsbon bij Humo en bestel je boek online via de webshop.</p>
        <p>Laat je meeslepen door Humo’s top 10 SF, met onder andere The Handmaids Tale en Neuromancer.</p>
      </div>
      <div>
        <p class="campaign_button"><a href=""></a>Bekijk boeken</p>
        <!-- link naar boeken categorie in webshop -->
      </div>
    </div>
  </div>
</section>

<section class="content_webshop">
  <div class="wrapper_shop">
    <aside class="controls_webshop">
      <h3>Filter producten:</h3>
      <div class="searchbox">
        <form action="" role="search"><input type="search" maxlength="512" aria-label="Search" placeholder="Zoek in shop...">
          <button type="submit" title="Search">
        </form>
      </div>
      <div class="filter_option">
        <p>Filter op prijs</p>
        <p>Van €2 tot €60</p>
        <!-- vul prijs hier in via js -->
        <input type="range" min="1" max="100" value="50" class="price-slider" id="price-slider">
      </div>
      <div class="filter_option">
        <p>Selecteer een categorie</p>
        <div class="categorie_options">
          <div>
            <input name="checkbox1" id="checkbox1" type="checkbox">
            <label for="checkbox1">Humo</label>
          </div>
          <div>
            <input name="checkbox2" id="checkbox2" type="checkbox">
            <label for="checkbox2">Boeken</label>
          </div>
          <div>
            <input name="checkbox3" id="checkbox3" type="checkbox">
            <label for="checkbox3">Boek toebehoren</label>
          </div>
        </div>
      </div>
      <div class="filter_submit">
        <button type="submit" name="action" value="filter">Filter</button>
      </div>
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
              <!-- //<?php echo '<img src="' . $productImage['image'] . '" alt="' . $product['name'] . '" />'; ?> -->
            </div>
            <div class="product_information">
              <div>
                <p class="product-title"><?php echo $product['name']; ?></p>
                <!-- link naar detailpagina in naam en image -->
                <div>
                  <!-- <p class="categorie"><?php echo $product['Categorie']; ?></p> -->
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
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
