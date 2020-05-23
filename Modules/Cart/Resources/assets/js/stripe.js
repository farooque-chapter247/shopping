const stripe = Stripe('pk_test_rSKVfHW6ojMPxWBux6kUi4lz002pMmoLQQ');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async(e) => {
    $('.loading').removeClass('invisible');
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: {
                name: cardHolderName.value,
                address: {
                    line1: 'N/A',
                    city: 'N/A',
                    state: 'N/A',
                    country: 'US'

                }



            }
        }
    );

    if (error) {
        $('.payment-error').text(error.message);

        // Display "error.message" to the user...
    } else {
        $('.payment-error').text('');
        // The card has been verified successfully...
        $('.loading').removeClass('invisible');
        var request = $.ajax({
            url: route('order.pay'),
            type: "post",
            data: {
                paymentid: paymentMethod.id,


            }

        });

        request.done(function(res) {
            if (res.status = "succeeded") {
                $(window).attr('location', route('front.order.detail', res.id));
            } else {
                $('.loading').addClass('invisible');
                $('.payment-error').text(res.status);
            }

        });

        request.fail(function(jqXHR, textStatus) {

        });



    }
})
$('#save-address').submit(function(e) {
    e.preventDefault();
    if ($(this).parsley().isValid()) {
        $.ajax({

            type: 'post',
            url: route('order.save.adrress'),
            dataType: 'json',
            data: $('#save-address').serialize(),
            success: function(data) {
                if (data.status == 'success') {
                    $('#paymentModal').modal('show');
                }
            }
        });
    }
});