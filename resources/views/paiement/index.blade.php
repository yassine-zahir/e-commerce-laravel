@extends('layouts.app')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
    
@endsection


@section('content')

    <div class="container col-md-9">
        <h1>Page de Paiement</h1>
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('paiement.thanks') }}" class="my-4" id="payment-form">
                    <div id="card-element">
                      <!-- Elements will create input elements here -->
                    </div>
                  
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
                  
                <button class="btn btn-success  my-4" type="submit" id="submit">Payment ( {{ Cart::total() }} Dhs)</button>
                  </form>
            </div>
        </div>
    </div>
    
@endsection

@section('extra-js')
<script>
    // Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
    var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
    var elements = stripe.elements();
    var style = {
        base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4"
        }
        },
        invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
    }
    });

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(ev) {
        console.log('yassine');
    ev.preventDefault();
    submitButton.disable = true;
    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
        card: card,
        
        }
    }).then(function(result) {
        if (result.error) {
            submitButton.disable = false;
        // Show error to your customer (e.g., insufficient funds)
        console.log(result.error.message);
        } else {
        // The payment has been processed!
        if (result.paymentIntent.status === 'succeeded') {
            // Show a success message to your customer
            // There's a risk of the customer closing the window before callback
            // execution. Set up a webhook or plugin to listen for the
            // payment_intent.succeeded event that handles any business critical
            // post-payment actions.
            console.log(result.paymentIntent)
        }
        }
    });
    });


</script>


    
@endsection