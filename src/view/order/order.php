<!-- Checkout page-->
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

    <!-- <section class="order_information">
      <form action="index.php?page=order" method="POST" id="order">
        <div class="order_information_part">
          <h1 class="order_information--title">Contact informatie</h1>
          <p>Vul je emailadres in zodat we je kunnen informeren over je bestelling.</p>
          <div class="form_part">
            <input type="email" id="email" name="email" value="" placeholder="Email" required>
          </div>
          <p class="order_checkbox"><input type="checkbox" name="newsletter" id="newsletter">Schrijf me in voor een weekelijkse nieuwsbrief met Humo nieuws en acties.</p>
        </div>

        <div class="order_information_part">
          <div>
            <h1 class="order_information--title">Verzend informatie</h1>
          </div>
          <p>Vul jouw gegevens in, zodat de bestelling naar de juiste plaats verzonden kan worden.</p>
          <div class="form_information">

            <div class="form_part floating_wrapper">
              <input class="floating_label_input" type="text" id="firstname" placeholder="Voornaam">
              <label class="floating_label" for="firstname">Voornaam</label>
            </div>

            <div class="form_part">
              <input class="floating_label_input" type="text" id="lastname" placeholder="Achternaam">
              <label class="floating_label" for="lastname">Achternaam</label>
            </div>

            <div class="form_part">
              <input class="floating_label_input" type="text" id="adres" placeholder="Adres + nummer">
              <label class="floating_label" for="adres">Adres + nummer</label>
            </div>

            <div class="form_part">
              <input class="floating_label_input" type="text" id="block" placeholder="Appartement, suite, etc (optioneel)">
              <label class="floating_label" for="block">Adres + nummer</label>
            </div>

            <div class="form_part">
              <input class="floating_label_input" type="text" id="postal" placeholder="Postcode">
              <label class="floating_label" for="postal">Postcode</label>
            </div>

            <div class="form_part">
              <input class="floating_label_input" type="text" id="city" placeholder="Stad">
              <label class="floating_label" for="city">Stad</label>
            </div>

          </div>
          <p class="order_checkbox"><input type="checkbox" name="saveinfo" id="safeinfo">Onthoud deze gegevens voor een volgende aankoop.</p>
        </div>
        <div class="order_information--buttons">
          <a class="button_back" href="index.php?page=cart">Terug naar winkelmandje</a>
          <a class="button_onward" href="">Verder naar verzendmethode</a>
        </div>
      </form>
    </section> -->

    <section class="order_verzenden">
      <div class="order_information_part">
        <h1 class="order_information--title">Overzicht gegevens</h1>
        <p>Hier vind je een overzicht van jouw contact en verzend gegevens.</p>
        <div class="order_info_grid">
          <div class="info_grid_part">
            <p>Contact</p>
            <p>emailadres customer</p>
            <p><a href="">Wijzig</a></p>
          </div>
          <div class="info_grid_part">
            <p>Verzend naar</p>
            <p>Adres informatie customer</p>
            <p><a href="">Wijzig</a></p>
          </div>
        </div>
      </div>

      <div class="order_information_part">
        <h1 class="order_information--title">Verzendmethode</h1>
        <p>Duid je verzendmethode naar voorkeur aan.</p>
        <div class="order_info_grid">
          <div class="info_grid_part">
            <input type="checkbox" name="shipping1" id="shipping">
            <div>
              <label for="shipping1">Gratis verzending</label>
              <p>Vijf tot zeven werkdagen</p>
            </div>
            <p>Gratis</p>
          </div>
          <div class="info_grid_part">
            <input type="checkbox" name="shipping2" id="shipping">
            <div>
              <label for="shipping2">Express verzending</label>
              <p>Morgen geleverd</p>
            </div>
            <p>Gratis</p>
          </div>
        </div>
      </div>
      <div class="order_information--buttons">
        <a class="button_back" href="index.php?page=cart">Terug naar informatie</a>
        <a class="button_onward" href="">Verder naar betaalmethode</a>
      </div>

    </section>

    <!-- <section class="order_betalen">
      <div>
        <h1 class="order_information--title title_red">Overzicht gegevens</h1>
        <p>Hier vind je een overzicht van jouw contact en verzend gegevens.</p>
        <div>
          <div>
            <p>Contact</p>
            <p>emailadres customer</p>
            <p><a href="">Wijzig</a></p>
          </div>
          <div>
            <p>Verzend naar</p>
            <p>Adres informatie customer</p>
            <p><a href="">Wijzig</a></p>
          </div>
          <div>
            <p>Methode</p>
            <p>Gratis verzending</p>
            <p><a href="">Wijzig</a></p>
          </div>
        </div>
      </div>
      <div>
        <h1 class="order_information--title title_red">Kortingscode</h1>
        <p>Vul hier je kortingscode in die je bij het Humo magazine hebt gevonden.</p>
        <div>
          <input type="text" placeholder="Kortingscode">
          <button type="submit" name="action" value="submit_code">Toepassen</button>
        </div>
      </div>
      <div>
        <h1 class="order_information--title title_red">Betaalmethode</h1>
        <p>Duid je betaalmethode naar voorkeur aan.</p>
        <div>
          <input type="radio" id="payment1" name="payment" value="bancontact">
          <label for="payment1">Bancontact</label>
          <div>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar Bancontact om de betaling veilig
            af te ronden.</div>
        </div>

        <div>
          <input type="radio" id="payment2" name="payment" value="paypal">
          <label for="payment2">Paypal</label>
          <div>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar PayPal om de betaling veilig
            af te ronden.</div>
        </div>

        <div>
          <input type="radio" id="payment3" name="payment" value="ideal">
          <label for="payment3">IDEAL</label>
          <div>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar IDEAL om de betaling veilig
            af te ronden.</div>
        </div>

        <div>
          <input type="radio" id="payment4" name="payment" value="belfius">
          <label for="payment4">Belfius</label>
          <div>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar de Belfius betaalpagina om de betaling veilig
            af te ronden.</div>
        </div>

        <div>
          <input type="radio" id="payment5" name="payment" value="kbc">
          <label for="payment5">KBC</label>
          <div>Na je op ‘Betalen’ heb geklikt, wordt je doorgeleid naar de KBC betaalpagina om de betaling veilig
            af te ronden.</div>
        </div>
      </div>
    </section> -->

  </div>

  <div class="overview_containter">
    <div class="order_overview">
      <div class="overview_header">
        <p class="overview_header--text">Totaal</p>
        <p class="overview_header--text">totaalprijs</p>
      </div>
      <p class="overview_heading overview_name">Naam</p>
      <p class="overview_heading overview_qty">Aantal</p>
      <p class="overview_heading overview_price">Prijs</p>
      <p class="overview_heading overview_subt">Subtotaal</p>
      <p class="overview_namevalue">Naam</p>
      <p class="overview_qtyvalue">1</p>
      <p class="overview_pricevalue">€12,99</p>
      <p class="overview_subtvalue">€12,99</p>
      <p class="overview_namevalue">Naam</p>
      <p class="overview_qtyvalue">1</p>
      <p class="overview_pricevalue">€12,99</p>
      <p class="overview_subtvalue">€12,99</p>
      <p class="overview_namevalue">Naam</p>
      <p class="overview_qtyvalue">1</p>
      <p class="overview_pricevalue">€12,99</p>
      <p class="overview_subtvalue">€12,99</p>
    </div>
  </div>

</div>
