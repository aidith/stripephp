<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

//$customer = \Stripe\Customer::retrieve("cus_EaXJrHLkAU1b2i");
//echo "<pre>";print_r($customer);


/*$token = \Stripe\Token::create([
    "bank_account" => [
      "country" => "US",
      "currency" => "usd",
      "account_holder_name" => "test1214",
      "account_holder_type" => "individual",
      "routing_number" => "110000000",
      "account_number" => "000123456789"
    ]
  ]);*/

  /*$charge = \Stripe\Charge::create([
    "amount" => 1500000.00,
    "currency" => "usd",
    //"source" => "tok_visa",
    "customer" => "cus_EaXJrHLkAU1b2i",
  ], ["stripe_account" => "acct_1E6cSwHBpYQXccqF"]);*/


  \Stripe\Payout::create([
    "amount" => 10,
    "currency" => "usd",
], ["stripe_account" => "acct_1E6cSwHBpYQXccqF"]);