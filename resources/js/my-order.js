$('body').on('click', '.print-open', function() {
    id = $(this).data('id');
    $.ajax({
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        url: route('front.order.detail.print', { order: id }),
        success: function(data) {
            // $('.full-modal').html(data);
            // $('#my-order-detail').modal('show');
            $('#outprint').html(data);
            var printContents = document.getElementById('outprint').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print({ mode: 'popup', popClose: true });

            document.body.innerHTML = originalContents;
        }
    });
})



// $(".printMe").click(function() {
//     // window.print()
//     // $("#outprint").print();
//     var printContents = document.getElementById('outprint').innerHTML;
//     var originalContents = document.body.innerHTML;

//     document.body.innerHTML = printContents;

//     window.print();

//     document.body.innerHTML = originalContents;
// });