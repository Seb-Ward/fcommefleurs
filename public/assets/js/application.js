$(document).ready(function () {
    $('#message_table').DataTable();
    $('#product_table').DataTable();

    $("#sign_in").submit(function (event) {
        const formData = {
            login: $("#login").val(),
            password: $("#password").val()
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/connection/connect",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (connection) {
            if (connection.success === true) {
                window.location.replace(connection.data.redirect);
            } else {
                alertError(connection.message);
            }
            $("#spinner-div").hide();
        });
        event.preventDefault();
    });

    $("#reset_password").submit(function (event) {
        const formData = {
            new_password: $("#new_password").val(),
            confirm_password: $("#confirm_password").val()
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/connection/change_password",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (reset) {
            if (reset.success === true) {
                window.location.replace(reset.data.redirect);
            } else {
                alertError(reset.message);
            }
            $("#spinner-div").hide();
        });
        event.preventDefault();
    });

    $("#edit_product").submit(function (event) {
        $("#spinner-div").show();
        $.ajax({
            url: "/product/edit_process",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json"
        }).done(function (edit) {
            if (edit.success === true) {
                window.location.replace("/product");
            } else {
                alertError(edit.message);
            }
            $("#spinner-div").hide();
        });
        event.preventDefault();
    });

    $(".product-remove").click(function(event) {
        const product_id = event.currentTarget.dataset.id;
        const formData = {
            product_id: product_id
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/product/remove",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (remove) {
            if (remove.success === true) {
                $("#product_"+product_id).remove();
                Swal.fire({
                    icon: 'success',
                    title: remove.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                alertError(remove.message);
            }
            $("#spinner-div").hide();
        });
    });


});

function ajaxRequest(url, dataRequest) {
    $("#spinner-div").show();
    $.ajax({
        type: "POST",
        url: url,
        data: dataRequest,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success === false) {
            alertError(data.message);
        } else {
            alertSuccess(data.message);
        }
        $("#spinner-div").hide();
    });
}

function alertSuccess(message) {
    Swal.fire({
        title: 'Succès',
        text: message,
        icon: 'success',
        confirmButtonText: 'Cool'
    })
}

function alertError(message) {
    Swal.fire({
        title: 'Erreur',
        text: message,
        icon: 'error',
        confirmButtonText: 'Cool',
        //footer: '<a href="">Why do I have this issue?</a>'
    });
}

function alertWarning(message) {
    Swal.fire({
        title: 'Attention',
        text: message,
        icon: 'warning',
        confirmButtonText: 'Cool'
    });
}


// Initialize and add the map
function initMap() {
    // The location of Uluru
    const shop = {lat: 43.579543, lng: 7.120698};
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: shop,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: shop,
        map: map,
    });
}

const loadFile = function (event) {
    const display_image = document.getElementById('product_image');
    const upload_image = display_image.querySelectorAll('.upload');
    upload_image.forEach(image => {
        image.remove();
    });
    for (let i = 0; event.target.files[i] != null; i++) {
        const icon = document.createElement("i");
        icon.className = "fa-regular fa-trash-can";
        const span = document.createElement("span");
        span.className = "delete-badge";
        span.appendChild(icon);
        const img = document.createElement('img');
        img.src = URL.createObjectURL(event.target.files[i]);
        img.className = "rounded mx-auto d-block";
        img.width = 100;
        img.height = 100;
        const item = document.createElement("div");
        item.className = "product_item upload";
        item.appendChild(span);
        item.appendChild(img);
        display_image.appendChild(item);
    }
};

window.initMap = initMap;