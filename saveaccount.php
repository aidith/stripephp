<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_rct4HMeN9nko8Ir1sjuIb2vf');

session_start();
if(!empty($_POST)){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $acc_name = $POST['acc_name'];
    $acc_num = $POST['acc_num'];
    $email = $POST['email'];
    $descr = $POST['descr'];
    $token = $POST['stripeToken'];
    $acc_routnum = $POST['acc_routnum'];
    $acc_type = $POST['acc_type'];
    $acc_cntry = $POST['acc_cntry'];
    $acc_curr = $POST['acc_curr'];
    $fname = $POST['fname'];
    $lname = $POST['lname'];

    try {
      // create token for legeal entity
      $legal_token = \Stripe\Token::create([
          "account" => [
            "legal_entity" => [
              "first_name" => $fname,
              "last_name" =>  $lname, 
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
            "country" => $acc_cntry,
            "email" => $email,
            "default_currency" => $acc_curr,
            "external_account" => $token,
            "account_token" => $legal_token->id             
        ]);    
        $_SESSION['message'] = 'success: New Customer created in connect account. Account id: '.$newacc->id;
    }catch(\Stripe\Error\Card $e) {
      // Since it's a decline, \Stripe\Error\Card will be caught
      $body = $e->getJsonBody();
      $err  = $body['error'];
      $_SESSION['message'] = 'error:'.$err['message'];
    } catch (\Stripe\Error\RateLimit $e) {
      // Too many requests made to the API too quickly
      $_SESSION['message'] = 'error:'.$e;
    } catch (\Stripe\Error\InvalidRequest $e) {
      // Invalid parameters were supplied to Stripe's API
      $_SESSION['message'] = 'error:'.$e;
    } catch (\Stripe\Error\Authentication $e) {
      // Authentication with Stripe's API failed
      // (maybe you changed API keys recently)
      $_SESSION['message'] = 'error:'.$e;
    } catch (\Stripe\Error\ApiConnection $e) {
      // Network communication with Stripe failed
      $_SESSION['message'] = 'error:'.$e;
    } catch (\Stripe\Error\Base $e) {
      // Display a very generic error to the user, and maybe send
      // yourself an email
      $_SESSION['message'] = 'error:'.$e;
    } catch (Exception $e) {
      // Something else happened, completely unrelated to Stripe
      $_SESSION['message'] = 'error:'.$e;
    }
    // Redirect on success
    header('Location: index.php');  

}