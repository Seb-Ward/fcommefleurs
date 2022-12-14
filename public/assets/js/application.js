const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})

$(document).ready(function () {
    const message_table = $('#message_table').DataTable();
    const product_table = $('#product_table').DataTable();

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

    $("#contactForm").submit(function (event) {
        event.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc76e0iAAAAAP1NPOQdXfn769_bBu8qBGLZSFw5', {action: 'validate_contact'}).then(function(token) {
                const formData = {
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    message: $("#message").val(),
                    token: token
                };
                if (formData.first_name === "" || formData.last_name === ""
                || formData.email === "" || formData.message === "") {
                    alertWarning("Veuillez remplir tout les champs du formulaire");
                } else {
                    ajaxRequest("/messages/add", formData);
                }
            });
          });
    });

    $("#submitShopForm").click(function(event) {
        event.preventDefault();
        const product_id = $("#product_id").val();
        const formData = {
            product_id: product_id
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/basket/add",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (add) {
            if (add.success === true) {
                swalWithBootstrapButtons.fire({
                    title: 'Finaliser votre commande ?',
                    text: '',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Non, continuer mes achats',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace("/basket");
                    }
                });
            } else {
                alertError(add.message);
            }
            $("#spinner-div").hide();
        });
    });

    $(".remove-basket").click(function(event) {
        const product_id = event.currentTarget.dataset.id;
        const formData = {
            product_id: product_id
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/basket/remove",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (remove) {
            if (remove.success === true) {
                $("#basket-product-" + product_id).remove();
                window.location.replace("/basket");
            } else {
                alertError(remove.message);
            }
            $("#spinner-div").hide();
        });
    });

    $("#submitMessageCard").click(function (event) {
        const formData = {
            message: $("#message").val()
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/basket/add_message",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (add_message) {
            if (add_message.success === true) {
                window.location.replace("/basket/delivery");
            } else {
                alertError(add_message.message);
            }
            $("#spinner-div").hide();
        });
        event.preventDefault();
    });

    $("#validSignUp").click(function(event) {
        const formData = {
            email: $("#email").val(),
            password: $("#password").val(),
            confirm_password: $("#confirm_password").val(), 
            gender_id: $("input[name='gender']:checked").val(), 
            name: $("#first_name").val(), 
            surname: $("#last_name").val(), 
            phone: $("#phone").val(), 
            address: $("#address").val(), 
            zipcode: $("#zipcode").val(), 
            city: $("#town").val(), 
            address_bis: $("#additional_address").val(),
            society_name: $("#company_name").val()
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/sign_up/save_customer",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(sign_up) {
            if (sign_up.success === true) {
                window.location.replace("/home");
            } else {
                alertError(sign_up.message);
            }
            $("#spinner-div").hide();
        });
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
                product_table.row(this).remove().draw();
                swalWithBootstrapButtons.fire({
                    icon: 'success',
                    title: remove.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alertError(remove.message);
            }
            $("#spinner-div").hide();
        });
    });

    $(".message-remove").click(function(event) {
        const message_id = event.currentTarget.dataset.id;
        const formData = {
            message_id: message_id
        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/messages/delete",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (remove) {
            if (remove.success === true) {
                message_table.row(this).remove().draw();
                swalWithBootstrapButtons.fire({
                    icon: 'success',
                    title: remove.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alertError(remove.message);
            }
            $("#spinner-div").hide();
        });
    });

    $("#validDelivery").click(function(event) {
        const formData = {
            gender_woman: $("#gender_woman").val(), 
            gender_men: $("#gender_men").val(), 
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            company_name: $("#company_name").val(), 
            address: $("#address").val(), 
            zipcode: $("#zipcode").val(), 
            town: $("#town").val(), 
            additional_address: $("#additional_address").val(), 
            phone: $("#phone").val(), 

        };
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/basket/process_delivery",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(delivery) {
            if (delivery.success === true) {
                window.location.replace("/payment/");
            } else {
                alertError(delivery.message);
            }
            $("#spinner-div").hide();
        });
        event.preventDefault();
    });

    $("a").click(function(event) {
        $('#cover').fadeOut(1000);
    });

    
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale('+scale+')',
                    //'position': 'absolute'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function(){
        return false;
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
    swalWithBootstrapButtons.fire({
        title: 'Succ??s',
        text: message,
        icon: 'success',
        confirmButtonText: 'Cool'
    });
}

function alertError(message) {
    swalWithBootstrapButtons.fire({
        title: 'Erreur',
        text: message,
        icon: 'error',
        confirmButtonText: 'Cool',
        //footer: '<a href="">Why do I have this issue?</a>'
    });
}

function alertWarning(message) {
    swalWithBootstrapButtons.fire({
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
        icon.className = "fa-solid fa-plus";
        const span = document.createElement("span");
        span.className = "notif add-notif";
        span.addEventListener('click', function(e) {
            $("#image").click();
        })
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

const removeImage = function(event) {
    const parentElement = event.currentTarget.parentElement;
    const image_id = parentElement.dataset.id;
    if (image_id !== undefined) {
        $("#spinner-div").show();
        $.ajax({
            type: "POST",
            url: "/product/remove_image",
            data: { id: image_id },
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data.success === false) {
                alertError(data.message);
            } else {
                parentElement.remove();
                alertSuccess(data.message);
            }
            $("#spinner-div").hide();
        });
    } else {
        alertError("Identifiant de l'image inconnu, veuillez contacter le support")
    }
}


window.initMap = initMap;








