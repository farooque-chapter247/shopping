jQuery(function() { Codebase.helpers(['flatpickr', 'datepicker', 'select2']); });
window.columns = [


    { data: 'order_number', name: 'order_number', orderable: true, searchable: true },

    { data: 'user.name' },
    { data: 'total' },
    { data: 'created_at' },
    { data: 'status' },




    {
        "render": function(data, type, row) {
            html = '<div class="btn-group">';
            html += modalButton(row['id'], 'Order-detail');

            html += "</div>";
            return html;
        },
    }
];