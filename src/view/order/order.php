<!-- Checkout page-->
<form action="index.php?page=order" method="POST">
  <div class="flex_order">
    <div class="grid_order">
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

      <?php if (empty($_POST['action']) || $_POST['action'] === 'information') { ?>

        <section class="order_information">
          <div class="order_information_part">
            <h1 class="order_information--title">Contact informatie</h1>
            <p>Vul je emailadres in zodat we je kunnen informeren over je bestelling.</p>
            <div class="form_part">
              <input type="email" name="email" value="<?php echo !empty($order['customer']['email']) ? $order['customer']['email'] : null; ?>" placeholder="Email">
            </div>
            <p class="order_checkbox"><input type="checkbox" name="newsletter" <?php echo !empty($order['customer']['newsletter']) ? "checked" : ""; ?>>Schrijf me in voor een weekelijkse nieuwsbrief met Humo nieuws en acties.</p>
          </div>

          <div class="order_information_part">
            <div>
              <h1 class="order_information--title">Verzend informatie</h1>
            </div>
            <p>Vul jouw gegevens in, zodat de bestelling naar de juiste plaats verzonden kan worden.</p>
            <div class="form_information">

              <div class="form_part floating_wrapper">
                <input class="floating_label_input" type="text" name="firstname" placeholder="Voornaam" value="<?php echo !empty($order['customer']['firstname']) ? $order['customer']['firstname'] : null; ?>">
                <label class="floating_label" for="firstname">Voornaam</label>
              </div>

              <div class="form_part">
                <input class="floating_label_input" type="text" name="lastname" placeholder="Achternaam" value="<?php echo !empty($order['customer']['lastname']) ? $order['customer']['lastname'] : null; ?>">
                <label class="floating_label" for="lastname">Achternaam</label>
              </div>

              <div class="form_part">
                <input class="floating_label_input" type="text" name="adres" placeholder="Adres + nummer" value="<?php echo !empty($order['customer']['adres']) ? $order['customer']['adres'] : null; ?>">
                <label class="floating_label" for="adres">Adres + nummer</label>
              </div>

              <div class="form_part">
                <input class="floating_label_input" type="text" name="box" placeholder="Appartement, suite, etc (optioneel)" value="<?php echo !empty($order['customer']['box']) ? $order['customer']['box'] : null; ?>">
                <label class="floating_label" for="box">Adres + nummer</label>
              </div>

              <div class="form_part">
                <input class="floating_label_input" type="text" name="postal" placeholder="Postcode" value="<?php echo !empty($order['customer']['postal']) ? $order['customer']['postal'] : null; ?>">
                <label class="floating_label" for="postal">Postcode</label>
              </div>

              <div class="form_part">
                <input class="floating_label_input" type="text" name="city" placeholder="Stad" value="<?php echo !empty($order['customer']['city']) ? $order['customer']['city'] : null; ?>">
                <label class="floating_label" for="city">Stad</label>
              </div>

            </div>
          </div>
          <div class="order_information--buttons">
            <a class="button_back" href="index.php?page=cart">Terug naar winkelmandje</a>
            <button type="submit" name="action" value="shipping" class="button_onward">Verder naar verzendmethode</button>
          </div>
        </section>

      <?php } else if ($_POST['action'] === 'shipping') { ?>

        <section class="order_verzenden">
          <div class="order_information_part">
            <h1 class="order_information--title">Overzicht gegevens</h1>
            <p>Hier vind je een overzicht van jouw contact en verzend gegevens.</p>
            <div class="order_info_grid">
              <div class="info_grid_part bottomline">
                <p class="txt_bold">Contact</p>
                <p><?php echo $order['customer']['email']; ?></p>
              </div>
              <div class="info_grid_part">
                <p class="txt_bold">Verzend naar</p>
                <p><?php echo $order['customer']['adres']; ?> <?php echo $order['customer']['box']; ?> <br>
                  <?php echo $order['customer']['postal']; ?> <?php echo $order['customer']['city']; ?></p>
              </div>
            </div>
          </div>

          <div class="order_information_part">
            <h1 class="order_information--title">Verzendmethode</h1>
            <p>Duid je verzendmethode naar voorkeur aan.</p>
            <div class="order_info_grid">

              <?php foreach ($shipping_types as $shipping_type) : ?>
                <div class="info_grid_part2 bottomline">
                  <input type="radio" name="shipping" value="<?php echo $shipping_type['id']; ?>" required <?php echo !empty($order['shipping_type']) && $order['shipping_type']['id'] == $shipping_type['id'] ? "checked" : ""; ?>>
                  <div>
                    <p><?php echo $shipping_type['name']; ?></p>
                    <p class="text_small_gray"><?php echo $shipping_type['description']; ?></p>
                  </div>
                  <div>
                    <p><?php echo $shipping_type['price']; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
          <div class="order_information--buttons">
            <button type="submit" name="action" value="information" class="button_back">Terug naar informatie</button>
            <button type="submit" name="action" value="payment" class="button_onward">Verder naar betaalmethode</button>
          </div>
        </section>

      <?php } else if ($_POST['action'] === 'payment' || $_POST['action'] === 'submit_code') { ?>

        <section class="order_betalen">

          <div class="order_information_part">
            <h1 class="order_information--title">Overzicht gegevens</h1>
            <p>Hier vind je een overzicht van jouw contact en verzend gegevens.</p>
            <div class="order_info_grid">
              <div class="info_grid_part bottomline">
                <p class="txt_bold">Contact</p>
                <p><?php echo $order['customer']['email']; ?></p>
              </div>
              <div class="info_grid_part bottomline">
                <p class="txt_bold">Verzend naar</p>
                <p><?php echo $order['customer']['adres']; ?> <?php echo $order['customer']['box']; ?> <br>
                  <?php echo $order['customer']['postal']; ?> <?php echo $order['customer']['city']; ?></p>
              </div>
              <div class="info_grid_part">
                <p class="txt_bold">Methode</p>
                <p><?php echo $order['shipping_type']['name']; ?></p>
              </div>
            </div>
          </div>

          <div class="order_information_part">
            <h1 class="order_information--title">Kortingscode</h1>
            <p>Vul hier je kortingscode in die je bij het Humo magazine hebt gevonden.</p>
            <div class="korting_part">
              <input type="text" placeholder="Kortingscode" name="code" value="<?php echo !empty($_SESSION['order']['discount']) ? $_SESSION['order']['discount']['code'] : null; ?>">
              <button class="korting_button" type="submit" name="action" value="submit_code">Toepassen</button>
            </div>
          </div>

          <div class="order_information_part">
            <h1 class="order_information--title">Betaalmethode</h1>
            <p>Duid je betaalmethode naar voorkeur aan.</p>
            <p>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar Bancontact om de betaling veilig
              af te ronden.</p>
            <div class="order_info_grid">
              <div class="info_grid_part2 bottomline payoption">
                <input type="radio" id="payment1" name="payment" value="bancontact" required>
                <label for="payment1">Bancontact</label>
                <img src="./assets/img/icons/bancontact.png" alt="bancontact icon">
              </div>

              <div class="info_grid_part2 bottomline payoption">
                <input type="radio" id="payment2" name="payment" value="paypal">
                <label for="payment2">Paypal</label>
                <img src="./assets/img/icons/paypal.png" alt="paypal icon">
              </div>

              <div class="info_grid_part2 bottomline payoption">
                <input type="radio" id="payment3" name="payment" value="ideal">
                <label for="payment3">IDEAL</label>
                <img src="./assets/img/icons/ideal.png" alt="ideal icon">
              </div>

              <div class="info_grid_part2 bottomline payoption">
                <input type="radio" id="payment4" name="payment" value="belfius">
                <label for="payment4">Belfius</label>
                <img src="./assets/img/icons/belfius.png" alt="belfius icon">
              </div>

              <div class="info_grid_part2 payoption">
                <input type="radio" id="payment5" name="payment" value="kbc">
                <label for="payment5">KBC</label>
                <img src="./assets/img/icons/kbc.png" alt="kbc icon">
              </div>

            </div>
          </div>
          <div class="order_information--buttons">
            <button type="submit" name="action" value="shipping" class="button_back">Terug naar verzendmethode</button>
            <button type="submit" name="action" value="complete" class="button_onward">Betalen</button>
          </div>

        </section>

      <?php } ?>

    </div>

    <div class="overview_containter">
      <div class="order_overview">
        <div class="overview_header">
          <p class="overview_header--text">Totaal</p>
          <p class="overview_header--text overview_totprice"><?php echo round($order['ordertotal'] * (1 - (!empty($order['discount']) ? $order['discount']['percentage'] : 0)) + (!empty($order['shipping_type']) ? $order['shipping_type']['price'] : 0), 2);  ?></p>
        </div>
        <p class="overview_heading overview_name">Naam</p>
        <p class="overview_heading overview_qty">Aantal</p>
        <p class="overview_heading overview_price">Prijs</p>
        <p class="overview_heading overview_subt">Subtotaal</p>
        <?php foreach ($order['orderlines'] as $orderline) :
          $subtotal = $orderline['quantity'] * $orderline['variant']['price']; ?>
          <p class="overview_border_top"></p>
          <p class="overview_namevalue"><?php echo $orderline['name'] ?>
            <?php if ($orderline['name'] != $orderline['variant']['name']) { ?>
              <br><?php echo $orderline['variant']['name'] ?>
            <?php } ?></p>
          <p class="overview_qtyvalue"><?php echo $orderline['quantity'] ?></p>
          <p class="overview_pricevalue"><?php echo $orderline['variant']['price'] ?></p>
          <p class="overview_subtvalue"><?php echo $subtotal ?></p>
        <?php endforeach; ?>
        <?php if (!empty($order['shipping_type'])) { ?>
          <p class="overview_border_top"></p>
          <p class="overview_namevalue"><?php echo $order['shipping_type']['name'] ?></p>
          <p class="overview_qtyvalue">1</p>
          <p class="overview_pricevalue"><?php echo $order['shipping_type']['price'] ?></p>
          <p class="overview_subtvalue"><?php echo $order['shipping_type']['price'] ?></p>
        <?php } ?>
        <?php if (!empty($order['discount'])) { ?>
          <p class="overview_border_top"></p>
          <p class="overview_namevalue">Korting</p>
          <p class="overview_qtyvalue">1</p>
          <p class="overview_pricevalue">-<?php echo round($order['ordertotal'] * $order['discount']['percentage'], 2); ?></p>
          <p class="overview_subtvalue">-<?php echo round($order['ordertotal'] * $order['discount']['percentage'], 2) ?></p>
        <?php } ?>
      </div>
    </div>
  </div>
</form>
