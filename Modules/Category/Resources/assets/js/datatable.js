window.columns = [


    { data: 'name', name: 'name', orderable: true, searchable: true },
    { data: 'description' },

    {
        "render": function(data, type, row) {
            html = '<div class="btn-group">';
            html += viewButton(route('subcategory', { category: row['id'] }), 'view SubCategory');
            html += editButton(route('category.edit', { category: row['id'] }), 'Edit Category ');

            html += deleteButton(route('category.delete', { category: row['id'] }), 'Delete Category ')

            html += "</div>";
            return html;
        },
    }
];