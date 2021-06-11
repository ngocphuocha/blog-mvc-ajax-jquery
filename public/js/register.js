$(document).ready(function () {
    $("#register").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        console.log(url);
        var token = $("input[name='_token']").val();
        var email = $("#email").val();
        var age = $("#age").val();
        var userName = $("#name").val();
        var gender = $("#gender").val();
        console.log(gender);
        var phone = $('#phone').val();
        var address = $("#address").val();
        var password = $("#password").val();
        var password_confirmation = $("#password-confirmation").val();

        $.ajax({
            type: "POST",
            url: url,
            data: {
                '_token': token,
                'email': email,
                'age': age,
                'name': userName,
                'gender': gender,
                'phone': phone,
                'address': address,
                'password': password,
                'password_confirmation': password_confirmation,
            },
            dataType: 'json',
            success: function (response) {
                toastr.success('Register Success');
                window.location.replace("http://demolravel.test/login");
            },
            error: function (response) {
                var errors = JSON.parse(response.responseText);
                console.log(errors);
                $.each(errors, function (key, value) {
                    if (key == 'email') {
                        $.each(errors.email, function (key, item) {
                            toastr.error(item);
                            $("#email").addClass('border border-red-500');
                        });
                    }
                    if (key == 'name') {
                        $.each(errors.name, function (key, item) {
                            toastr.error(item);
                            $("#name").addClass('border border-red-500');
                        });
                    }
                    if (key == 'age') {
                        $.each(errors.age, function (key, item) {
                            toastr.error(item);
                            $("#age").addClass('border border-red-500');
                        });
                    }
                    if (key == 'phone') {
                        $.each(errors.phone, function (key, item) {
                            toastr.error(item);
                            $("#phone").addClass('border border-red-500');
                        });
                    }
                    if (key == 'address') {
                        $.each(errors.address, function (key, item) {
                            toastr.error(item);
                            $("#address").addClass('border border-red-500');
                        });
                    }
                    if (key == 'password') {
                        $.each(errors.password, function (key, item) {
                            toastr.error(item);
                            $("#password").addClass('border border-red-500');
                            $("#password-confirmation").addClass('border border-red-500');
                        });
                    }
                });
            }
        });
    });
});