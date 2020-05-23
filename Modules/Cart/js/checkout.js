$(document).ready(function() {

    /* Set rates + misc */

    var fadeTime = 300;


    /* Assign actions */
    $('.product-quantity input').change(function() {
        updateQuantity(this);
    });

    $('.product-removal button').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                removeItem(this);
            }
        })

    });


    /* Recalculate cart */
    function recalculateCart() {
        var subtotal = 0;

        /* Sum up row totals */
        $('.product').each(function() {
            subtotal += parseFloat($(this).children('.product-line-price').text());
        });

        /* Calculate totals */

        var total = subtotal;

        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function() {
            $('#cart-subtotal').html('<i class="fa fa-dollara"></i>"' + subtotal.toFixed(2));


            $('#cart-total').html('<i class="fa fa-dollara"></i>"' + total.toFixed(2));
            if (total == 0) {

                $('.checkout').fadeOut(fadeTime);
            } else {
                $('.checkout').fadeIn(fadeTime);
            }
            // $('.totals-value').fadeIn(fadeTime);
        });
    }


    /* Update quantity */
    function updateQuantity(quantityInput) {

        var rowid = $(quantityInput).attr('data-rowid');
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        var request = $.ajax({
            url: route('cart.update'),
            type: "get",
            data: {
                rowid: rowid,
                qty: quantity
            }

        });

        request.done(function(res) {


            /* Update line price display and recalc cart totals */
            productRow.children('.product-line-price').each(function() {
                $(this).fadeOut(fadeTime, function() {

                    $(this).html('<i class="fa fa-dollara"></i>"' + linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        });

        request.fail(function(jqXHR, textStatus) {

        });
        /* Calculate line price */

    }


    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var rowid = $(removeButton).attr('data-rowid');

        var request = $.ajax({
            url: route('cart.remove'),
            type: "get",
            data: { rowid: rowid }

        });

        request.done(function(res) {
            console.log(res);
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });
        });

        request.fail(function(jqXHR, textStatus) {

        });

    }

});