// Create a Stripe client
var stripe = Stripe('pk_test_3QTRH4zogtWOn438CU0G4wYn');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Style button with BS
document.querySelector('#payment-form button').classList = 'btn btn-primary btn-block mt-4';

document.querySelector('#payment-form button').innerHTML = "Create";

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken('bank_account', {
    country: form.acc_cntry.value,
    currency: form.acc_curr.value,
    routing_number: form.acc_routnum.value, // document.querySelector('.inp-first-name').value
    account_number: form.acc_num.value,
    account_holder_name: form.acc_name.value,
    account_holder_type: form.acc_type.value,
  }).then(function(result) {
    // Handle result.error or result.token
    if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('bank-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
      }
  });

});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}



