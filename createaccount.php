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
    <h2 class="my-4 text-center">Create Customer with External Account - Bank </h2>
    <form action="./saveaccount.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="fname" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">       
       <input type="text" name="lname" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">      
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">       
       <input type="text" name="acc_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Account Holder Name">
       <input type="text" name="acc_num" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Account Number">
       <input type="text" name="acc_routnum" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Routing Number">
       <input type="text" name="acc_type" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Account holder type">
       <input type="text" name="acc_cntry" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Country">
       <input type="text" name="acc_curr" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Currency">
       <textarea name="descr"  class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Description"></textarea>
           

        <!-- Used to display form errors -->
        <div id="bank-errors" role="alert"></div>
      </div>
      <div style="float:left;">
        <button >Submit</button>
        </div>
        <div style="float:left;padding-left: 15px;">
        <a class="btn btn-primary btn-block mt-4" href="index.php">Back</a>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/account.js"></script>
</body>
</html>
