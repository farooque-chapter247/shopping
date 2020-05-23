window.columns = [
    { data: 'name', name: 'name', orderable: true, searchable: true },
    { data: 'description' },

    {
        "render": function(data, type, row) {
            html = '<div class="btn-group">';

            html += editButton(route('subcategory.edit', { subcategory: row['id'] }), 'Edit SubCategory ');

            html += deleteButton(route('subcategory.delete', { subcategory: row['id'] }), 'Delete SubCategory ')

            html += "</div>";
            return html;
        },
    }
];