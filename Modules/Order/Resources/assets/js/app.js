$(document).on('click', '.modal_trigger', function() {
    id = $(this).data('id');
    $.ajax({
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        url: route('order.detail.user', { order: id }),
        success: function(data) {
            $('.full-modal').html(data);
            $('#order-detail-customer').modal('show');
        }
    });
})