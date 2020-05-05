<?php $__env->startSection('content'); ?>
<?php
  $annoucement = isset($_GET["annoucement"]) ? $_GET["annoucement"] : "";
  $title = get_the_title($annoucement);

  if(empty($_GET["annoucement"]) || empty($title)) :
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
  ?>
  <div class="p404_content">
    <h1>La page que vous recherchez </br> semble introuvable.</h1>
    <img src="<?= App\asset_path('images/404.png'); ?>" />
    <a href="/">Retour à la Page d’accueil</a>
  </div>
  <?php else : ?>
    <?php
      $price = get_field("prix", $annoucement );
      $shipping = get_field("livraison", $annoucement );
      $subtotal = $price;
      $total = $price + $shipping;
    ?>
    <section class="pay-left">
      <div class="header-pay">
        <img src="<?= App\asset_path('images/img_pay/logo.png'); ?>" alt="logo" />
      </div>

      <div class="pay-container">
          <div class="pay-steps">
              <ul>
                  <li class="active-li" id="li1"><span>01</span> Adresse de livraison</li>
                  <li id="li2"><span>02</span> Paiement</li>
                  <li id="li3"><span>03</span> Confirmation</li>
              </ul>
          </div>

          <div class="pay-form" id="form-pay">
              <h1>Saisir une adresse de livraison</h1>
              <form action="/paiement/" enctype="multipart/form-data" method="POST" >
                  <div class="flexinput-pay">
                      <div class="flex-left">
                          <label for="firstname">Prénom*</label>
                          <br />
                          <input type="text" placeholder="Saisissez votre prénom" id="firstname" required/>
                      </div>

                      <div class="flex-right">
                          <label for="name">Nom*</label>
                          <br />
                          <input type="text" placeholder="Saisissez votre nom" id="name" />
                      </div>
                  </div>

                  <label for="adress">Adresse*</label>
                  <input type="text" placeholder="Saisissez l’adresse de livraison" id="adress" />

                  <div class="flexinput-pay">
                      <div class="flex-left">
                          <label for="town">Ville*</label>
                          <br />
                          <input type="text" placeholder="Saisissez la ville" id="town" />
                      </div>

                      <div class="flex-right">
                          <label for="zipcode">Code postal*</label>
                          <br />
                          <input type="text" placeholder="Saisissez votre code postal" id="zipcode" />
                      </div>
                  </div>

                  <div class="flexinput-pay">
                      <div class="flex-left">
                          <label for="country">Pays*</label>
                          <br />
                          <select id="country">
                              <option value="1" selected>France</option>
                          </select>
                      </div>

                      <div class="flex-right">
                          <label for="phone">Numéro de téléphone**</label>
                          <br />
                          <input type="text" placeholder="Saisissez votre numéro de téléphone" id="phone" />
                      </div>
                  </div>

                  <p class="pay-bottom">
                      <span id="back-pay" onclick="window.location.href='<?= get_permalink($annoucement) ?>'">
                          <img src="<?= App\asset_path('images/img_pay/arrow.png'); ?>" alt="flèche" id="arrow-pay" />
                          <span id="content-pay">Abandonner ma commande</span>
                      </span>
                      <span id="button-pay">
                          <button type="submit" id="tunnelNext">Envoyer à cette adresse</button>
                      </span>
                  </p>
              </form>
          </div>

          <div class="redirect" id="redirection">
              <h2>Redirection vers la plateforme de paiement</h2>
              <p id="patience">Merci de patienter, vous allez être redirigé vers la plateforme de paiement.</p>
              <p id="seconds">Si rien ne se passe dans 10 secondes, cliquez sur le bouton ci-dessous</p>
              <p id="redirect-button"><button type="button" id="tunnelNext2">Payer</button></p>
          </div>

          <div class="confirmation" id="confirm">
              <h2>Merci de votre commande</h2>
              <p>Nous vous remercions de votre commande. Nous vous tiendrons informés par<br /> e-mail lorsque l’article de votre commande aura été expédié. </p>

              <a href="#">
                <p id="question">Vous avez une question ? Contactez-nous</p>
              </a>

              <p><button type="button" onclick="window.location.href='index.phtml'">Retour en page d'accueil</button></p>
          </div>

      </div>
    </section>
    <aside class="pay-right">
      <div class="header-pay" id="mobiltitle">
        <img src="<?= App\asset_path('images/img_pay/logo.png'); ?>" alt="logo" />
      </div>
      <h2>Votre commande</h2>
      <h2 class="h2-confirm">Confirmation de votre commande</h2>
      <p class="p-confirm">
          <span class="bold-p">Votre commande sera expédiée à:</span><br />
          205 chemin des peupliers, 59700 Marcq-en-Baroeul
      </p>
      <p class="p-confirm">
          <span class="bold-p">Destinataire</span><br />
          Pascal Plancke
      </p>
      <p class="p-confirm" id="p-underline">
          <span class="bold-p">Votre mode de livraison</span><br />
          Livraison standard
      </p>
      <p class="p-confirm">
          <span class="bold-p">Détails de la commande</span><br />
          Commande n° 123-456-789<br />
          Effectuée le 5 juin 2019
      </p>
      <div class="product-pay">
          <div class="picture-pay">
            <img src="<?= App\asset_path('images/img_pay/product.png'); ?>" alt="logo" />
          </div>

          <div class="product-content-pay">
            <p><?= $title ?></p>
            <p>€ <?= $price ?></p>
          </div>
      </div>

      <div class="sub-total">
          <p><span>Sous total</span><span>€ <?= $subtotal ?></span></p>
          <p><span>Livraison</span><span>€ <?= $shipping ?></span></p>
      </div>

      <p class="total"><span>Total</span><span>€ <?= $total ?></span></p>
    </aside>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>