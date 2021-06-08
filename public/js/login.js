$(document).ready(function () {
    $("#login").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');

        var email = $("input[name='email']").val();

        var password = $("input[name='password']").val();

        var token = $("input[name='_token']").val();

        $.ajax({
            type: "POST",
            url: url,
            data: {
                'email': email,
                'password': password,
                '_token': token
            },
            dataType: "json",
            success: function (response) {
                window.location.replace("http://demolravel.test/products");
            },

            error: function (response) {
                var err = JSON.parse(response.responseText);
                console.log(err.error);

                $.each(err.error, function (key, value) {
                    if (key == 'email') {
                        $("#email-error").text(value[0]);
                    }

                    if (key == 'password') {
                        $("#password-error").text(value[0]);
                    }
                });
            }

        });
    });
});