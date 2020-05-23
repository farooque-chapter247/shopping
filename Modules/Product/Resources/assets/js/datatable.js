window.columns = [


    { data: 'name', name: 'name', orderable: true, searchable: true },
    { data: 'actual_price', name: 'actual_price' },
    { data: 'sell_price', name: 'sell_price' },


    {
        "render": function(data, type, row) {
            html = '<div class="btn-group">';

            html += editButton(route('product.edit', { product: row['id'] }), 'Edit Product');

            html += deleteButton(route('product.delete', { product: row['id'] }), 'Delete Product')

            html += "</div>";
            return html;
        },
    }
];