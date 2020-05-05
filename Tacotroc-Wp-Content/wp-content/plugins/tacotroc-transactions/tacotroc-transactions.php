<?php
/*
Plugin Name: Tacotroc Transaction
Plugin URI: https://tacotroc.com
Description: Gestion des transactions bancaire
Version: 1.0
*/

add_action('admin_menu', 'transactions_plugin_setup_menu');
 
function transactions_plugin_setup_menu(){
    add_menu_page( 'Gestion des transactions', 'Transactions', 'manage_options', 'transactions-plugin', 'transaction_plugin' );
}
 
function transaction_plugin(){

    global $wpdb;

    $query = "SELECT * FROM transactions WHERE status='paid' ORDER BY id DESC";
    $transactions = $wpdb->get_results($query);

    ?>
    <h1>Gestion des transactions</h1>
    <div class="wrap">
      <table class="wp-list-table widefat fixed striped pages">
          <thead>
            <tr>
                <th scope="col">N° commande</th>
                <th scope="col">Date du paiement</th>
                <th scope="col">Annonce</th>
                <th scope="col">Prix TTC</th>
                <th scope="col">Nom de l'acheteur</th>
                <th scope="col">Date de picking prévue</th>
            </tr>
          </thead>

          <tbody id="the-list">
            <?php foreach($transactions as $transaction): ?>
              <tr>
                  <td><?= $transaction->id ?></td>
                  <td><?= date('d-m-y h:m:s', $transaction->time_in_progress) ?></td>
                  <td><a href="/wp-admin/post.php?post=<?= $transaction->id_offer ?>&action=edit"><?= get_the_title($transaction->id_offer) ?></a></td>
                  <td><?= $transaction->ttc_price ?></td>
                  <td><?= $transaction->buyer_lastname ?> <?= $transaction->buyer_firstname ?></td>
                  <td><?= $transaction->picking_date ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>

          <tfoot>
            <tr>
              <th scope="col">N° commande</th>
              <th scope="col">Date du paiement</th>
              <th scope="col">Annonce</th>
              <th scope="col">Prix TTC</th>
              <th scope="col">Nom de l'acheteur</th>
              <th scope="col">Date de picking prévue</th>
            </tr>
          </tfoot>

      </table>
    </div>
    <?php
}

/**
 * Confirm payment with webhook Paypal
 */
function ipn_func() {
    global $wpdb;

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    $token_transaction =  $input['resource']['custom_id'];
    $ttc_price = $input['resource']['amount']['value'];

    $query = "SELECT * FROM transactions WHERE token_transaction='{$token_transaction}' AND ttc_price='{$ttc_price}'";
    $transaction = $wpdb->get_results($query);
    
    if(isset($transaction[0]->id)){
        $updated = $wpdb->update( 
            "transactions", 
            ["status" => "paid"], 
            [
                "status" => 'in_progress', 
                "token_transaction" => $token_transaction
            ] 
        );

        if($updated === 1){
            // Payment confirmed 
            $my_post = array(
                'ID' => $transaction[0]->id_offer,
                'post_status' => "vendue",
            );

            wp_update_post( $my_post );

            sendEmailConfirmationAchat([
              "email" => $transaction[0]->buyer_email,
              "command_id" => $transaction[0]->id,
              "lastname" => strtoupper($transaction[0]->buyer_lastname),
              "firstname" => strtoupper($transaction[0]->buyer_firstname),
              "adress" => strtoupper($transaction[0]->buyer_adress),
              "city" => strtoupper($transaction[0]->buyer_city),
              "postal" => $transaction[0]->buyer_postale,
              "state" => strtoupper($transaction[0]->buyer_state),
              "date" => date("d") . " " . frenchMonth(date("m")) . " " . date("Y"), 
              "offer_title" => get_the_title($transaction[0]->id_offer),
              "offer_price" => $transaction[0]->ttc_price
            ]);
        }
    }
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'transactions', '/ipn', array(
      'methods' => 'POST',
      'callback' => 'ipn_func',
    ));
});

/**
 * Change status transaction to in_progress by transaction
 */
function in_progress_func() {
    global $wpdb;

    $updated = $wpdb->update( 
        "transactions", 
        ["status" => "in_progress"], 
        [
            "id_offer" => $_POST["id_offer"], 
            "token_transaction" => $_POST["token_transaction"]
        ] 
    );
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'transactions', '/in_progress', array(
      'methods' => 'POST',
      'callback' => 'in_progress_func',
    ));
});

/*
    Custom box for informations seller
*/
function seller_informations_register_meta_boxes() {
  $id_post = get_the_ID();
  $post = get_post($id_post);

  if($post->post_status === "vendue"){
    add_meta_box( 'hcf-1', __( "Informations sur l'acheteur", 'hcf' ), 'seller_informations_display_callback', 'offres' );
  }
}
add_action( 'add_meta_boxes', 'seller_informations_register_meta_boxes' );

function seller_informations_display_callback( $post ) {
  global $wpdb;

  $query = "SELECT * FROM transactions WHERE id_offer='{$post->ID}' AND status='paid'";
  $transaction = $wpdb->get_results($query);

  ?>
    <table class="wp-list-table widefat fixed striped pages">
        <tbody id="the-list">
            <tr>
                <td>Numéro de commande</td>
                <td><?= $transaction[0]->id ?></td>
            </tr>

            <tr>
                <td>Nom et prénom de l'acheteur</td>
                <td><?= $transaction[0]->buyer_lastname ?> <?= $transaction[0]->buyer_firstname?></td>
            </tr>

            <tr>
                <td>Email de l'acheteur</td>
                <td><?= $transaction[0]->buyer_email ?></td>
            </tr>

            <tr>
                <td>Numéro de téléphone</td>
                <td><?= $transaction[0]->buyer_phone ?></td>
            </tr>

            <tr>
                <td>Date de pickup</td>
                <td><?= $transaction[0]->picking_date ?></td>
            </tr>

            <tr>
                <td>Adresse de l'acheteur</td>
                <td>
                  <?= strtoupper($transaction[0]->buyer_lastname) ?> <?= strtoupper($transaction[0]->buyer_firstname) ?> </br>
                  <?= $transaction[0]->buyer_adress ?></br>
                  <?= strtoupper($transaction[0]->buyer_city) ?> <?= $transaction[0]->buyer_postal ?> </br>
                  <?= strtoupper($transaction[0]->buyer_state) ?> </br>
                </td>
            </tr>

            <tr>
                <td>Prix TTC</td>
                <td><?= $transaction[0]->ttc_price ?>€</td>
            </tr>

            <tr>
                <td>Tarif de la livraison HT</td>
                <td><?= $transaction[0]->shipping_price ?>€</td>
            </tr>
        </tbody>
    </table>

  <?php
}

function authSupplyShip(){
    $client_id = "5d9355c891e07f3423cda0fa_301elc2z6pmoww488o8kswwwk48cogco04s0ok40kk8kss0gog";
    $client_secret = "426wpyk041kwk8c4wc0s0ckg4kwcocwk4ow8cccg80k0cgkkk0";
    $grant_type = "client_credentials";
    $username = "tacotroctest";
    $password = "tacotroctest";

    $lien = "https://www.api.supplyship.fr/oauth/token?client_id=5d9355c891e07f3423cda0fa_301elc2z6pmoww488o8kswwwk48cogco04s0ok40kk8kss0gog&client_secret=426wpyk041kwk8c4wc0s0ckg4kwcocwk4ow8cccg80k0cgkkk0&grant_type=client_credentials&username=tacotroctest&password=tacotroctest";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $lien);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $return = curl_exec($curl);
    curl_close($curl);

    return json_decode($return);
}

function getPriceSupplyShip($data){
    $curl = curl_init();

    $lien = "https://www.api.supplyship.fr/api/offers";

    $headers = [
        "Authorization: Bearer {$data['token']}",
    ];

    $order = $data['order'];

    $postfields = array(
        'departureDate' => "{$order['packing']['picking_date']}T15:00:00Z",
        'type' => 'colis',
        'sender' => array(
            "zipCode" => $order['seller']['postal'],
            "city" => strtoupper($order['seller']['city']),
            "country" => "FRANCE",
            "pro" => "true"
        ),
        'recipient' => array(
            "zipCode" => $order['buyer']['postal'],
            "city" => strtoupper ($order['buyer']['city']),
            "country" => "FRANCE",
            "pro" => "true"
        ),
        'packing' => array(
            array(
                "weight" => $order['packing']['weight'],
                "length" => $order['packing']['packing_depth'],
                "width" => $order['packing']['packing_larger'],
                "height" => $order['packing']['packing_height'],
                "value" => $order['offer']['price'],
                "quantity" => "1",
                "originCountryCode" =>"FR"
            )
        )
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $lien);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_COOKIESESSION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postfields));

    $return = curl_exec($curl);
    curl_close($curl);

    return json_decode($return);
}

function date_getArrayHolidays( $year = null , $format = "Y-m-d" ) {
    if ($year === null) {
        $year = intval(date('Y'));
    }

    $easterDate  = easter_date($year);
    $easterDay   = date('j', $easterDate);
    $easterMonth = date('n', $easterDate);
    $easterYear   = date('Y', $easterDate);

    $holidays = array(
        // Dates fixes
        date( $format, mktime(0, 0, 0, 1,  1,  $year)),  // 1er janvier
        date( $format, mktime(0, 0, 0, 5,  1,  $year)),  // Fête du travail
        date( $format, mktime(0, 0, 0, 5,  8,  $year)),  // Victoire des alliés
        date( $format, mktime(0, 0, 0, 7,  14, $year)),  // Fête nationale
        date( $format, mktime(0, 0, 0, 8,  15, $year)),  // Assomption
        date( $format, mktime(0, 0, 0, 11, 1,  $year)),  // Toussaint
        date( $format, mktime(0, 0, 0, 11, 11, $year)),  // Armistice
        date( $format, mktime(0, 0, 0, 12, 25, $year)),  // Noel
        // Dates variables
        date( $format, mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear)),  // Lundi de paques
        date( $format, mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),  // Jeudi de Ascension
        date( $format, mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)),  // Lundi de Pentecôte
    );
    sort($holidays);
    return $holidays;  
}

function date_addWorkingDays( $date_ts, $workingDays) {
    $year = date("Y", $date_ts );
    $ary_holidays = array_merge( date_getArrayHolidays( $year , "Y-m-d" ) , date_getArrayHolidays( $year+1 , "Y-m-d" ) );

    $i=0;
    while( $i < $workingDays) {
        $date_tmp = date( "Y-m-d" , strtotime ( $i . ' weekdays' , $date_ts ) );
        if( in_array( $date_tmp , $ary_holidays ) ) {
            $workingDays++;
        }
        $i++;
    }
    return strtotime ( $workingDays . ' weekdays' , $date_ts );
}

function newOrder($order){
    global $wpdb;
   
    $picking_date = date( "Y-m-d" , date_addWorkingDays( time(), 6 ) );

    $order["packing"]["picking_date"] = $picking_date;
    $supply = authSupplyShip();
    $prices = getPriceSupplyShip(array(
      'token' => $supply->access_token,
      'order' => $order
    ));

    if(!isset($prices->UPS_11->cumulativePrice)){
        $title = __('Erreur', 'sage');
        $footer = "Vous pouvez joindre contact@tacotroc.com afin d'avoir plus d'informations.";
        $message = "<h1>{$title}<br></h1><p>Une erreur c'est produite au niveau du transporteur.</p><p>{$footer}</p>";
        wp_die($message, $title);
    }

    $initial_price = $order["offer"]["price"];
    $shipping_price = $prices->UPS_11->cumulativePrice;
    $feet_shipping = $shipping_price  * 0.10;
    $ht_price = $initial_price + $feet_shipping + $shipping_price;
    $ttc_price = $ht_price * 1.20;

    $token_transaction = generateRandomString(10);

    $callback = array(
        'id_offer' => $order["offer"]["id"],
        "initial_price" => number_format($initial_price, 2, '.', ''),
        "shipping_price" => number_format(round($shipping_price = $prices->UPS_11->cumulativePrice, 2), 2, '.', ''),
        "feet_shipping" => number_format(round($feet_shipping, 2), 2, '.', ''),
        "ht_price" => number_format(round($ht_price, 2), 2, '.', ''),
        "ttc_price" => number_format(round($ttc_price, 2), 2, '.', ''),
        "custom_id" => $token_transaction,
    );

    $wpdb->insert(
        "transactions",
        array(
            'id_offer' => $order["offer"]["id"],  
            'buyer_state' => $order["buyer"]["state"],     
            'buyer_adress' => $order["buyer"]["adress"],            
            'buyer_city' => $order["buyer"]["city"],
            'buyer_postal' => $order["buyer"]["postal"],
            'buyer_firstname' => $order["buyer"]["firstname"],
            'buyer_lastname' => $order["buyer"]["lastname"],
            'buyer_email' => $order["buyer"]["email"],
            'buyer_phone' => $order["buyer"]["phone"],
            'shipping_price' => $callback["shipping_price"],
            'picking_date' => $picking_date,
            'ttc_price' => $callback["ttc_price"],
            'status' => "unpaid",
            'time_creation' => time(),
            'time_in_progress' => time(),
            'token_transaction' =>  $token_transaction
        )
    );

    return($callback);
}

/**
 * Check if the order is in progress paiement or paid
 */
function offerHasOpen($id_offer){
    global $wpdb;

    $post = get_post($id_offer);

    if($post->post_status === "publish"){
        $query = "SELECT count(*) as count FROM transactions WHERE id_offer='{$id_offer}' AND (status='paid') OR (status = 'in_progress' AND time_in_progress > (UNIX_TIMESTAMP() - 600) )";
        $offer = $wpdb->get_results($query);

        if($offer[0]->count === "0"){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}