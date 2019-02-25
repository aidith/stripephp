<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

$token = \Stripe\Token::create([
  "card" => [
    "number" => "4000056655665556",
    "exp_month" => 2,
    "exp_year" => 2020,
    "cvc" => "314",
    "currency" => "usd",
    "name" => "John"
  ]
]);
// create token for legeal entity
$legal_token = \Stripe\Token::create([
    "account" => [
    "legal_entity" => [
        "first_name" => "Natalia",
        "last_name" =>  "Tz", 
        "dob" => [
            "day" => 5,
            "month" => 5,
            "year" => 1984,
        ],  
        "type" => "individual",   
        "ssn_last_4" => "0000",
        "address" => [
            "city" => "plano",
            "country" => "US",
            "line1" => "street 1",
            "line2" => "",
            "postal_code" => "75074",
            "state" => "TX",
        ],
    ],          
    "tos_shown_and_accepted" => true,
    ]
]);

// create new custom connect account
$newacc = \Stripe\Account::create([
    "type" => "custom",
    "country" => "US",
    "email" => "test123@gmail.com",
    "default_currency" => "usd",
    "external_account" => $token->id,
    "account_token" => $legal_token->id             
]);  

echo 'success: New Customer created in connect account. Account id: '.$newacc->id;
