function confirmDestroy(url, id, reference, callback) {
    let lang = $('html').attr('lang');
    Swal.fire({
        title: lang == 'en' ? "Are you sure?" : "هل أنت متأكد؟",
        text: lang == 'en' ? "This item will be deleted!" : "سيتم حذف العنصر",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: lang == 'en' ? "Yes, delete it!" : "تأكيد",
        cancelButtonText: lang == 'en' ? "No, cancel!" : "إلغاء",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            deleteItem(url, id, reference, callback);
            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
        }
    });
}

function deleteItem(url, id, reference, deleteCallback) {
    let lang = $('html').attr('lang');
    axios.delete('/' + lang + url + '/' + id)
        .then(function (response) {
            // handle success 2xx
            console.log(response);
            showMessage(response.data.message);
            if (deleteCallback != undefined) {
                deleteCallback(true);
            } else {
                reference.closest('tr').remove();
            }
        })
        .catch(function (error) {
            // handle error 4xx - 5xx
            console.log(error);
            if (callback != undefined) {
                callback(true);
            }
            showMessage(error.response.data.message, true);
        });
}

function showMessage(message, error = false) {
    Swal.fire({
        position: "center",
        icon: !error ? "success" : "error",
        title: message,
        showConfirmButton: false,
        timer: 1500
    });
}

function store(url, data, redirectRoute) {
    let lang = $('html').attr('lang');
    axios.post('/' + lang + url, data).then(function (response) {
        console.log(response);
        if (redirectRoute != undefined) {
            window.location.href = redirectRoute;
        } else {
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
        }
    }).catch(function (error) {
        console.log(error);
        toastr.error(error.response.data.message)
    });
}

function update(url, data, redirectRoute) {
    let lang = $('html').attr('lang');
    axios.put('/' + lang + url, data).then(function (response) {
        // handle success 2xx
        console.log(response);
        if (redirectRoute != undefined) {
            window.location.href = redirectRoute;
        } else {
            toastr.success(response.data.message);
        }
    }).catch(function (error) {
        // handle error 4xx - 5xx
        console.log(error);
        toastr.error(error.response.data.message)
    });
}

function showToaster(message, error = false) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (error)
        toastr.error(message);
    else
        toastr.success(message);
}