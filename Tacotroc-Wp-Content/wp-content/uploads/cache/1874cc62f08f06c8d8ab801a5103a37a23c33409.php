<?php
  include_once( ABSPATH . 'wp-admin/includes/image.php' );

  if(!empty($_POST)) {
    // Type annonce (announcementType)
    $type = $_POST["announcementType"];
    // Catégorie (category)
    $category = $_POST["category"];
    // Sous catégorie (subcategory)
    $subcategory = $_POST["subcategory"];
    // Sous sous catégorie (subsubcategory)
    $subsubcategory = $_POST["subsubcategory"];
    // Marque (brands)
    $brand = $_POST["brand"];
    // Modéle (models)
    $model = $_POST["model"];
    // Année modèle (yearmodel)
    $yearmodel = $_POST["yearmodel"];
    // Etat (state)
    $state = $_POST["state"];
    // Titre de l'annonce (title)
    $title = $_POST["title"];
    // Description de l'annonce (description)
    $description = $_POST["description"];
    // Prix (price)
    $price = $_POST["price"];
    // Poid de l'objet (weight)
    $weight = $_POST["weight"];
    // Nom (name)
    $name = $_POST["name"];
    // Société (society)
    $society = $_POST["society"];
    // Ville (city)
    $city = $_POST["city"];
    // Email (email)
    $email = $_POST["email"];
    // Téléphone (phone)
    $phone = $_POST["phone"];

    $uploaddir = wp_upload_dir();

    foreach($_FILES as $key => $file) {
      if(!empty($_FILES['picture_1']['name'])){
        $uploadfile[$key] = $uploaddir["basedir"] . "/tmp/" . time() . "-" .  basename($_FILES[$key]['name']);
        move_uploaded_file($_FILES[$key]['tmp_name'], $uploadfile[$key]);
      }
    }

    $my_post = array(
      'post_title'    => wp_strip_all_tags( $title ),
      'post_status'   => 'pending',
      'post_author'   => 1,
      "post_type" => "offres"
    );

    $new = wp_insert_post( $my_post );

    wp_set_object_terms( $new, intval($subsubcategory), 'category_piece' );

    update_field("modele", intval($model), $new);
    update_field("etat", $state, $new);
    update_field("type", $type, $new);
    update_field("ville", $city, $new);
    update_field("prix", $price, $new);
    update_field("email", $email, $new);
    update_field("poids", $weight, $new);
    update_field("year_model", $yearmodel, $new);
    update_field("description", $description, $new);
    update_field("name", $name, $new);

    foreach($_FILES as $key => $file) {
      if(!empty($_FILES[$key]['name'])){
        $wp_filetype = wp_check_filetype(basename($uploadfile[$key]), null );
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => "Image 1",
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment( $attachment, $uploadfile[$key] );
        $imagenew = get_post( $attach_id );
        $fullsizepath = get_attached_file( $imagenew->ID );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        update_field($key, $attach_id, $new);
      }
    }

    header('Location: http://tacotroc.net/nouvelle-annonce/?v=1');
  exit();
  }
?>


<?php $__env->startSection('content'); ?>
<p class="path" style="cursor:pointer">
  <span onclick="window.location.href='/'">Accueil</span>
  <span class="pathImg"><img src="<?= App\asset_path('images/img_research/Base.png'); ?>" id="triangle" /></span>
  <span class="pathelt"> Déposer une annonce</span></p>
    <form action="/nouvelle-annonce/" enctype="multipart/form-data" method="POST">
        <section id="announcement">
            <h1>Votre annonce</h1>
            <h2>Type d’annonce*</h2>
            <p><input type="radio" name="announcementType" id="type1" value="offre" /><label for="type1">Offre (vous vendez une pièce détachée)</label></p>
            <p><input type="radio" name="announcementType" id="type2" value="demande" /><label for="type2">Demande (vous recherchez une pièce détachée)</label></p>
            <p><input type="radio" name="announcementType" id="type3" value="echange" /><label for="type3">Échange ou don (vous échangez ou donnez une pièce détachée)</label></p>
            <p><label for="category" class="labelSelect">Catégorie*</label></p>
            <p>
                <select id="category" name="category" ></select>
            </p>
            <p>
              <label for="subcategory" class="labelSelect subcategory">Sous Catégorie*</label>
            </p>
            <p>
                <select id="subcategory" class="subcategory" name="subcategory" ></select>
            </p>
            <p>
              <label for="subsubcategory" class="labelSelect subsubcategory">Catégorie finale*</label>
            </p>
            <p>
              <select id="subsubcategory" class="subsubcategory" name="subsubcategory" ></select>
            </p>
            <!-- <p><label for="brand" class="labelSelect">Marques*</label></p>
            <p>
            <select style="width: 50%" class="js-brands-ajax" name="brand" ></select>
            </p> -->
            <p>
              <label for="model" class="labelSelect">Modèle</label>
            </p>
            <p>
              <select style="width: 50%" class="js-models-ajax" name="model"></select>
            </p>
            <p>
              <label for="yearmodel" class="labelSelect">Année Modèle</label>
            </p>
            <p>
              <select id="yearmodel" name="yearmodel" >
                  <option value="" disabled selected>Sélectionner l’année modèle de voiture d’ou provient la pièce</option>
                  <option value="1">1970</option>
                  <option value="2">1971</option>
                  <option value="3">1972</option>
                  <option value="3">1973</option>
                  <option value="3">1974</option>
                  <option value="3">1975</option>
                  <option value="3">1976</option>
                  <option value="3">1977</option>
                  <option value="3">1978</option>
                  <option value="3">1979</option>
                  <option value="3">1980</option>
              </select>
            </p>
            <p><label for="state" class="labelSelect">Etat*</label></p>
            <p>
                <select value="" id="state"  name="state">
                    <option disabled selected>Sélectionner l’état de la pièce</option>
                    <option value="Mauvais état">Mauvais état</option>
                    <option value="Bon état">Bon état</option>
                    <option value="Comme neuf">Comme neuf</option>
                </select>
            </p>
            <p><label for="title" class="labelSelect">Titre de l’annonce*</label></p>
            <p id="titleP"><input type="text" id="title" name="title" placeholder="Saisissez le titre de votre annonce"  /><img src="<?= get_template_directory_uri(); ?>/assets/images/img_new_announcement/3-layers.png" alt="bulle" id="bubble" /></p>
            <p><label for="descriptif" class="labelSelect">Descriptif de l’annonce*</label></p>
            <p id="textareaP"><textarea placeholder="Saisissez votre description" name="description" id="counter" maxlength="1000" ></textarea><span id="compteur">1000</span></p>

            <p><label for="weight" class="labelSelect">Poids de la pièce*</label></p>
            <p><input type="number" id="weight" name="weight"  /></p>

            <p><label for="price" class="labelSelect">Prix*</label></p>
            <p><input type="number" id="price" name="price" /></p>
            <p><label for="photos" class="labelSelect" id="testFile">Photos * <span id="colorChange">Formats acceptées: jpg, png</span></label> </p>
            <div id="fileContainer">
                <div class="fileDiv" >
                    <p class="fileP">
                      <input type="file" name="picture_1" id="picture_1" accept="image/png, image/jpeg" multiple style="opacity:0" />
                      <img src="<?= App\asset_path('images/img_new_announcement/cross.png'); ?>" alt="croix" class="cross" id="cross1" />
                    </p>
                    <div class="fileChosen" data-default="<?= App\asset_path('images/img_new_announcement/selectImg.png'); ?>"></div>
                </div>
                <div class="fileDiv">
                    <p class="fileP">
                      <input type="file" name="picture_2" id="picture_2" accept="image/png, image/jpeg" multiple style="opacity:0" />
                      <img src="<?= App\asset_path('images/img_new_announcement/cross.png'); ?>" alt="croix" id="cross2" class="cross" />
                    </p>
                    <div class="fileChosen" data-default="<?= App\asset_path('images/img_new_announcement/selectImg.png'); ?>"></div>
                </div>
                <div class="fileDiv">
                    <p class="fileP">
                      <input type="file" name="picture_3" id="picture_3" accept="image/png, image/jpeg" multiple style="opacity:0" />
                      <img src="<?= App\asset_path('images/img_new_announcement/cross.png'); ?>" alt="croix" id="cross3" class="cross" />
                    </p>
                    <div class="fileChosen" data-default="<?= App\asset_path('images/img_new_announcement/selectImg.png'); ?>"></div>
                </div>
            </div>
        </section>
        <section id="info">
            <h1>vos informations</h1>
            <div id="companyAndName">
                <div id="name">
                    <p><label for="name">Nom*</label></p>
                    <p><input type="text" id="name" name="name" /></p>
                </div>
                <div id="company">
                    <p><label for="company">Société (facultatif)</label></p>
                    <p><input type="text" name="society" id="company" /></p>
                </div>
            </div>
            <p><label for="town">Ville*</label></p>
            <p><input type="text" id="town" name="city"  /></p>
            <p><label for="mail">Email* <span>Votre adresse mail n’apparaitra pas dans l’annonce</span></label></p>
            <p><input type="mail" name="email" id="mail"  /></p>
            <p><label for="tel">Téléphone* <span>Votre numéro de téléphone n’apparaitra pas dans l’annonce</span></label></p>
            <p><input type="tel" id="tel" name="phone"  /></p>
        </section>
        <p id="buttonP"><span>* Champs obligatoires</span><button type="submit">Publier l’annonce</button></p>
    </form>
    <div id="announcement__validation" class="<?php if($_GET['v'] == "1"){ echo "active"; } ?>">
      <div class="announcement__validation--layer"></div>
      <div class="announcement__validation--container">
        <h3>Annonce en cours de vérification…</h3>
        <p>Votre annonce sera relue par notre équipe éditoriale pour validation. Une fois votre annonce confirmée, elle sera validée et mise en ligne dans un délai de 48h maximum. Vous recevrez un email de confirmation, vous indiquant que votre annonce est en ligne.</p>
        <p>En cas de refus de votre annonce par l’équipe éditoriale, vous recevrez un mail vous expliquant les motifs du refus.</p>

        <p>Si vous ne recevez pas de mail de confirmation, 2 options:</br>
        - l’adresse mail indiquée n’est pas valide</br>
        - l’email a été bloqué par votre filtre antispam. Dans ce dernier cas il vous suffit de retrouver l’email  dans votre boite de reception anti-spam.</p>

        <div class="announcement__validation--container-buttons">
          <div class="link">Une question ? <a href="">Contactez-nous</a></div>
          <div class="button">J’ai compris</div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>