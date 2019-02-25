<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

$customer = \Stripe\Customer::retrieve("cus_EZle8SJe2cK0ft");

$source = \Stripe\Source::create([
    "type" => "ach_credit_transfer",
    "currency" => "usd",
    "owner" => [
      "email" => "test1214@mailinator.com"
    ]
  ]);

  $res = $customer->sources->create(["source" => $source->id]);

  echo "<pre>";
  print_r($res);