<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

$account = \Stripe\Account::retrieve("acct_1E7QbkBWVVbkpBkO");

echo "<pre>";
print_r($account);