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
                location.reload();
            },

            error: function (response) {
                var html = '<p>Checking</p>';
            }
        });
    });
});