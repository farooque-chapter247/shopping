require('./bootstrap');
jQuery(function() {
    Codebase.helpers('notify');
    setTimeout(function() {
        $('.custom-notify-set').addClass('fadeOut FadeOutDown')
    }, 5000);
});


window.confirmBox = function(title, message, url) {
    var e = Swal.mixin({
        buttonsStyling: !1,
        customClass: {
            confirmButton: "btn btn-alt-success m-5",
            cancelButton: "btn btn-alt-danger m-5",
            input: "form-control"
        }
    });
    e.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: !0,
        customClass: {
            confirmButton: "btn btn-alt-danger m-1",
            cancelButton: "btn btn-alt-secondary m-1"
        },
        confirmButtonText: "Yes",
        cancelButtonText: 'No',
        html: !1,

    }).then((result) => {
        if (result.value) {

            window.location.href = url

        }
    })
}

window.confirmBoxLogout = function(title, message) {
    var e = Swal.mixin({
        buttonsStyling: !1,
        customClass: {
            confirmButton: "btn btn-alt-success m-5",
            cancelButton: "btn btn-alt-danger m-5",
            input: "form-control"
        }
    });
    e.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: !0,
        customClass: {
            confirmButton: "btn btn-alt-danger m-1",
            cancelButton: "btn btn-alt-secondary m-1"
        },
        confirmButtonText: "Yes",
        cancelButtonText: 'No',
        html: !1,

    }).then((result) => {
        if (result.value) {

            document.getElementById('logout-form').submit();
        }
    })
}


window.editButton = function(route, tooltip) {
    var container = $('<div/>');
    var button = $('<a />', {
        href: route,
        title: tooltip,
        html: '<i class="fa fa-pencil"></i>',
        class: 'btn btn-alt-primary btn-circle ml-2',
    }).appendTo(container);

    return container.html();
}
window.viewButton = function(route, tooltip) {
    var container = $('<div/>');
    var button = $('<a />', {
        href: route,
        title: tooltip,
        html: '<i class="fa fa-eye"></i>',
        class: 'btn btn-alt-primary btn-circle ml-2',
    }).appendTo(container);

    return container.html();
}

window.createLink = function(route, tooltip, content) {
    var container = $('');
    var button = $('<a />', {
        href: route,
        title: tooltip,
        html: content


    }).appendTo(container);

    return container.html();
}
window.deleteButton = function(route, tooltip) {
    var container = $('<div/>');
    var button = $('<a />', {
        href: 'javascript:;',
        title: tooltip,
        html: '<i class="fa fa-trash"></i>',
        class: 'btn btn-alt-danger btn-circle ml-1',
        onclick: " window.confirmBox(`Are you Sure ?`, `You want to delete it`,'" + route + "')",


    });


    button.appendTo(container);
    return container.html();
}
window.modalButton = function(id, tooltip) {
    var container = $('<div/>');
    var button = $('<a />', {
        'data-id': id,
        title: tooltip,
        html: '<i class="fa fa-eye"></i>',
        class: 'btn btn-alt-info btn-circle modal_trigger ml-2',
    }).appendTo(container);

    return container.html();
}