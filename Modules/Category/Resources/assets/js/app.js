jQuery(function() { Codebase.helpers(['flatpickr', 'datepicker']); });

class CategoryCreate {

    initDatePicker() {

    }

    init() {
        jQuery(function() { Codebase.helpers(['flatpickr', 'datepicker']); });
        this.initDatePicker();



    }

    docsUpload() {
        $('#file_title').on('keyup', function() {
            $('input[name="name"]').val($(this).val());
        })
    }

    initFileUpload() {
        $('#updatefile').change(function() {
            var file_data = $('#updatefile').prop('files')[0];
            var category_id = $('#category_id').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: route('category.upload', category_id),
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

let categorycreate = new CategoryCreate();

$(document).ready(function() {
    categorycreate.docsUpload();
    categorycreate.initFileUpload();
    categorycreate.init();
})