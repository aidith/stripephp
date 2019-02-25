<?php

require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_JxjIJysDjGttW5sSxFnyDc8G');

$newacc = \Stripe\Account::create([
    "type" => "custom",
    "country" => "US",
    "email" => "test1214@mailinator.com"
  ]);

  echo $newacc->id;