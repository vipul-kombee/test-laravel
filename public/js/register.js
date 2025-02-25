$(document).ready(function () {

    $('#state').change(function() {
        let stateID = $(this).val();
        $('#city').html('<option value="">Select City</option>');

        if (stateID) {
            $.ajax({
                url: citiesApiUrl,
                type: "GET",
                data: { state_id: stateID },
                success: function (data) {    
                    console.log(data);

                    $.each(data.data, function (id, citydata) {
                        $('#city').append('<option value="' + citydata.id + '">' + citydata.name + '</option>');
                    });
                }
            });
        }
    });
    
    
    $('#roles').select2({
        placeholder: "Select Roles",
        allowClear: true,
        multiple: true,
        width: '100%',
        ajax: {
            url: rolesApiUrl,
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data.roles, function(item) {
                        return { id: item.id, text: item.name };
                    })
                };
            },
            cache: true
        }
    });

    $("#registerForm").validate({
        rules: {
            first_name: {
                required: true,
                alphanumeric: true
            },
            last_name: {
                required: true,
                alphanumeric: true
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
            contact_number: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            postcode: {
                required: true,
                // pattern: /^\d{5}$/
            },
            // gender: {
            //     required: true
            // },
            // hobbies: {
            //     required: true
            // }
        },
        submitHandler: function (form) {
            $.ajax({
                url: userRegisterUrl,
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.token) {
                        alert("User Registerd Successfully.");
                        localStorage.setItem('authToken', response.token);                    
                        window.location.href = response.redirect;
                    } else {
                        alert("something went wrong.")
                    }
                },
            });
        },
    });

    $("#userLogin").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: loginUrl,
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    
                    if (response.token) {
                        alert("User Login Successfully.");
                        localStorage.setItem('authToken', response.token);
                        window.location.href = response.redirect;
                    } else {
                        alert("something went wrong.")
                    }
                },
            });
        },
    });

    $.validator.addMethod("alphanumeric", function(value, element) {
        return /^[a-zA-Z0-9]+$/.test(value);
    }, "Only letters and numbers are allowed.");
});
