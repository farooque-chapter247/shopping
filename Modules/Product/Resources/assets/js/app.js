$eventselect = $(".sub_category_id");

class ProductCreate {

    initFileUpload() {
        $('#updatefile').change(function() {
            var file_data = $('#updatefile').prop('files')[0];
            var product_id = $('#product_id').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: route('product.upload', product_id),
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data.image);
                    $('.custom-change-image').attr('src', '');
                    $('.custom-change-image').attr('src', data.image);
                }
            });
        });
    }

}

let create = new ProductCreate();

$(document).ready(function() {

    create.initFileUpload();
    // $('.category_id').trigger('change');

})
$(".category_id").on("change", function(e) {

    var res = $.ajax({
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: route('subcategory.fetch'),
        data: {

            category_id: $('.category_id').val()
        },
        // data: function(params) {

        //     var query = {
        //         search: params.term,
        //         category_id: $('.category_id').val(),
        //     };



        // Query parameters will be ?search=[term]&type=public


    });
    res.done(function(data) {
        // $("#sub_category_id").remove();
        $("#sub_category_id").html('');
        $('#sub_category_id').select2();
        $('#sub_category_id').select2({
            'data': null
        });
        console.log(data.results);
        $("#sub_category_id").select2({ data: data.results });

    });



});


$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square' //circle
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload_image').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
});

$('.crop_image').click(function(event) {
    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: route('temp.product.upload'),
            type: "POST",
            data: { "image": response },
            success: function(data) {
                $('#uploadimageModal').modal('hide');
                $('#uploaded_image').html(data);
            }
        });
    })
});