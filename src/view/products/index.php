<!-- webshop all products page -->
<section>
  <header>
    <h1>Webshop Humo</h1>
    <nav>
      <ul>
        <li>Humo</li>
        <li>Webshop</li>
        <li>Alle producten</li>
      </ul>
    </nav>
  </header>
</section>

<section>
  <header>
    <h2>Sorteer</h2>
  </header>
  <p>Sorteer op populariteit</p>
  <div>
    <ul>
      <li>Sorteer op recentheid</li>
      <li>Sorteer op populariteit</li>
      <li>Sorteer op prijs: laag > hoog</li>
      <li>Sorteer op prijs: hoog > laag</li>
    </ul>
  </div>
</section>

<section>
  <div class="action-image">
    <img src="" alt="10 boeken actie Humo">
  </div>
  <div class="action-information">
    <header>
      <h2>10 weken lang een Science Ficiton boek bij Humo!</h2>
    </header>
    <p>Ontvang kortingsbon bij Humo en bestel je boek online via de webshop.</p>
    <p>Laat je meeslepen door Humo’s top 10 SF, met onder andere The Handmaids Tale en Neuromancer.</p>
    <p><a href=""></a>Bekijk boeken</p>
  </div>
</section>

<section>
  <div>
    <?php echo '<img src="' . $product_image['image'] . '" alt="' . $product['name'] . '" />'; ?>
  </div>
  <header>
    <h3 class="product-title"><?php echo $product['name']; ?></h3>
  </header>
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
</section>

<section>
  <header>
    <h3>Filters</h3>
  </header>
  <div>
    <h4>Prijs: van €2 tot €60</h4>
    <input type="range" min="1" max="100" value="50" class="price-slider" id="price-slider">
  </div>
  <div>
    <h4>Selecteer een categorie</h4>
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
  <button class="btn-filter" type="submit" name="action" value="filter">Filter</button>
</section>
