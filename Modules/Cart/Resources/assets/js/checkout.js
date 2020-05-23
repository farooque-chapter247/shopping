$(document).ready(function() {

    /* Set rates + misc */

    var fadeTime = 300;

    $('.pay-amount').html('$' + $('#cart-total').html());
    /* Assign actions */
    $('.product-quantity input').change(function() {
        updateQuantity(this);
    });


    $('.product-removal button').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete it.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
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
            $('#cart-subtotal').html(subtotal.toFixed(2));
            $('.pay-amount').html('$' + total.toFixed(2));


            $('#cart-total').html(total.toFixed(2));
            if (total == 0) {
                $('#product-table').css('display', 'none');


                $('.no-product').removeClass('invisible');
                $('.checkout').fadeOut(fadeTime);
            } else {
                $('.pay-amount').html('$' + total.toFixed(2));
                $('.shopping-cart').show();
                $('.no-product').addClass('invisible');
                $('.checkout').fadeIn(fadeTime);
            }
            $('.totals-value').fadeIn(fadeTime);
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
                    $(this).text(linePrice.toFixed(2));
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

    $('.minus').click(function() {
        var $input = $(this).parent().find('.quantity');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function() {
        var $input = $(this).parent().find('.quantity');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $("#submitForm").submit(function(e) {
        e.preventDefault();

        formData = new FormData($(this)[0]);
        $.ajax({

            type: 'post',
            url: route('ds'),
            dataType: 'json',
            data: formData,
            success: function(data) {
                alert(data.message);
            }
        });
    });

});