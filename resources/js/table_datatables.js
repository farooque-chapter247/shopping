/*
 *  Document   : tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Plugin Init Example Page
 */

// DataTables, for more examples you can check out https://www.datatables.net/

class pageTablesDatatables {
    /*
     * Init DataTables functionality
     *
     */



    static hideLoader() {
        setTimeout(function() {

            $('.table-responsive').show();
            $('.custom-loader').hide();
        }, 1500);
    }
    static initDataTables() {
        let properties = {
            serverSide: true,
            paging: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            ajax: {
                url: $('.js-dataTable-full').data('url'),
                data: {
                    status: $('#status').val(),
                    date: $('#date-mode-change').val()
                }
            },
            pageLength: 10,
            lengthMenu: [
                [5, 10, 20],
                [5, 10, 20]
            ],
            type: "POST",
            autoWidth: false,
            "drawCallback": pageTablesDatatables.hideLoader(),

        };

        // Override a few DataTable defaults
        jQuery.extend(jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
        if (typeof window.columns != 'undefined')
            properties['columns'] = window.columns;

        if (typeof window.columnDefs != 'undefined')
            properties['columnDefs'] = window.columnDefs;

        if (typeof window.order != 'undefined')
            properties['order'] = window.order;

        // Init full DataTable       
        jQuery('.js-dataTable-full').dataTable(properties);


    }


    /*
     * Init functionality
     *
     */
    static init() {
        pageTablesDatatables.initDataTables();

    }
}

// Initialize when page loads
jQuery(() => { pageTablesDatatables.init(); });