<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

$customer = \Stripe\Customer::retrieve("cus_EXEDcWugq0pk2j");
echo "<pre>";
print_r($customer);

