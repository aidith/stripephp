<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');
session_start();


if(!empty($_POST)){
  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
  $acc_id = $POST['acc_id'];
  $acc_amt = $POST['acc_amt'];
  $acc_amt = ($acc_amt * 100);
  try{
      // transfer from stripe to custom connect account of customer
      $transfer = \Stripe\Transfer::create([
        "amount" => $acc_amt,
        "currency" => "usd",
        "destination" => $acc_id
      ]);
      // move to bank account from custom connect
      $payout = \Stripe\Payout::create([
        "amount" => $acc_amt,
        "currency" => "usd",
      ], ["stripe_account" => $acc_id]);
      $_SESSION['message'] =$POST['acc_amt']." usd transfered to customer external account.";
    } catch (Exception $e) {
      // Something else happened, completely unrelated to Stripe
      $_SESSION['message'] = 'error:'.$e;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Create Transfer</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Transfer amount from Stripe platform to Customer Bank/Card </h2>
    <h4><?php 
      $message = "";
      if(!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo $message;
        session_destroy();
      }    
    ?></h4>
    <form action="createtransfer.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="acc_id" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Custom Connect Account Id">
       <input type="text" name="acc_amt" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="$usd">
      </div>

      <div style="float:left;">
        <button class="btn btn-primary btn-block mt-4">Submit</button>
        </div>
        <div style="float:left;padding-left: 15px;">
        <a class="btn btn-primary btn-block mt-4" href="index.php">Back</a>        
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
</body>
</html>