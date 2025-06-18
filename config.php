<?php
    require 'vendor/autoload.php';
    require('stripe-php-master/init.php');
    $publishable_key="pk_test_51RNbXGRdy99MB75ksZA4FjQexqRtfAoCgrsKVAOZHLPBsnGiEaoBkUREJOL6FuuG1Sjmx4hf30mXYkthVth9P82p00ykAGJJRv";
    $secret_key="sk_test_51RNbXGRdy99MB75kg4Dz8YqVSi5xRaNRVOtoafIO46qgDLO0Zp95YzCOu4heUhEjcueaaiZz9j8Cd2NZBZsewqa500ZzwU3ApW";
    \Stripe\Stripe::setApiKey($secret_key);

// use Stripe\Terminal\Location;

//     require __DIR__ . "/vendor/autoload.php";
//     $stripe_secret_key = "sk_test_51RNbXGRdy99MB75kg4Dz8YqVSi5xRaNRVOtoafIO46qgDLO0Zp95YzCOu4heUhEjcueaaiZz9j8Cd2NZBZsewqa500ZzwU3ApW";
//     \Stripe\Stripe::setApiKey($stripe_secret_key);

//     $checkout_session = \Stripe\Checkout\Session::create([
//         "mode" => "payment",
//         "success_url" => "http://localhost/EcoVoltify/success.php",
//         "line_items" => [
//             [
//                 "quantity" => 1,
//                 "price_data" => [
//                     "currency" => "usd",
//                     "unit_amount" => $_SESSION['finaltotal']*100,
//                     "product_data" => [
//                         "name" => $_SESSION['product_name'],

//                     ]
//                 ]
//             ]
//         ]

//     ]);
//     http_response_code(303);
//     header("Location: " . $checkout_session->url);

 ?>