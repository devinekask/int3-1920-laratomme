<!-- Checkout page-->
<div class="flex_order">
  <div class="grid_order">
    <section class="order_information">
      <form action="index.php?page=order" method="POST" id="order">
        <div>
          <h1 class="order_information--title">Contact informatie</h1>
          <p>Vul je emailadres in zodat we je kunnen informeren over je bestelling.</p>
          <div class="form_part">
            <input type="email" id="email" name="email" value="" placeholder="Email" required>
          </div>
          <div>
            <input type="checkbox" name="newsletter" id="newsletter">
            <p>Schrijf me in voor een weekelijkse nieuwsbrief met Humo nieuws en acties.</p>
          </div>
        </div>
        <div>
          <div>
            <h1 class="order_information--title">Verzend informatie</h1>
          </div>
          <p>Vul jouw gegevens in, zodat de bestelling naar de juiste plaats verzonden kan worden.</p>
          <div class="form_part">
            <input type="text" id="firstname" name="first_name" value="" placeholder="Voornaam" required>
          </div>
          <div class="form_part">
            <input type="text" id="lastname" name="last_name" value="" placeholder="Achternaam" required>
          </div>
          <div class="form_part">
            <input type="text" id="Adres" name="adres" value="" placeholder="Adres + nummer" required>
          </div>
          <div class="form_part">
            <input type="text" id="block" name="block" value="" placeholder="Appartement, suite, etc (optioneel)">
          </div>
          <div class="form_part">
            <input type="text" id="postal" name="postal" value="" placeholder="Postcode" required>
          </div>
          <div class="form_part">
            <input type="text" id="city" name="city" value="" placeholder="Stad" required>
          </div>
          <div>
            <input type="checkbox" name="saveinfo" id="safeinfo">
            <p>Onthoud deze gegevens voor een volgende aankoop.</p>
          </div>
          <div><a href="index.php?page=cart">Terug naar winkelmandje</a></div>
          <div><a href="">Verder naar verzendmethode</a></div>
        </div>
      </form>
    </section>

    <!-- <section class="order_verzenden">
      <div>
        <h1 class="order_information--title">Overzicht gegevens</h1>
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
        </div>
      </div>

      <div>
        <h1 class="order_information--title">Verzendmethode</h1>
        <p>Duid je verzendmethode naar voorkeur aan.</p>
        <div>
          <div>
            <input type="checkbox" name="shipping1" id="shipping">
            <div>
              <label for="shipping1">Gratis verzending</label>
              <p>Vijf tot zeven werkdagen</p>
            </div>
            <p>Gratis</p>
          </div>
          <div>
            <input type="checkbox" name="shipping2" id="shipping">
            <div>
              <label for="shipping2">Express verzending</label>
              <p>Morgen geleverd</p>
            </div>
            <p>Gratis</p>
          </div>
        </div>
      </div>

      <div><a href="index.php?page=cart">Terug naar informatie</a></div>
      <div><a href="">Verder naar betaalmethode</a></div>
    </section> -->

    <!-- <section class="order_betalen">
      <div>
        <h1 class="order_information--title">Overzicht gegevens</h1>
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
        <h1 class="order_information--title">Kortingscode</h1>
        <p>Vul hier je kortingscode in die je bij het Humo magazine hebt gevonden.</p>
        <div>
          <input type="text" placeholder="Kortingscode">
          <button type="submit" name="action" value="submit_code">Toepassen</button>
        </div>
      </div>
      <div>
        <h1 class="order_information--title">Betaalmethode</h1>
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

  <div class="order_overview">
    <div class="overview_heading">
      <p>Totaal</p>
      <p>totaalprijs</p>
    </div>
    <p>Naam</p>
    <p>Aantal</p>
    <p>Prijs</p>
    <p>Subtotaal</p>
    <p>Product beschrijving</p>
    <p>1</p>
    <p>€12,99</p>
    <p>€12,99</p>
  </div>

</div>
