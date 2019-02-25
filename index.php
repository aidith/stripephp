<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Create Customer</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Stripe API</h2>
    <h5>
      <?php
        session_start();
        $message = "";
        if(!empty($_SESSION['message'])) {
          $message = $_SESSION['message'];
          echo $message;
          session_destroy();
        }    
        ?>
    </h5>
        <div class="form-row"><a href="createcustomer.php">Create customer with External account - Card </a></div>
        <div class="form-row"><a href="createaccount.php">Create customer with External Account - Bank</a></div>
        <div class="form-row"><a href="createtransfer.php">Transfer amount from Stripe platform to Customer bank/card</a></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/customjs.js"></script>
</body>
</html>
