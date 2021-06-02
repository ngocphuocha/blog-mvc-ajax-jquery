$(document).ready(function () {
    $("#reset-pass").submit(function (e) {
        e.preventDefault();

        var url = $(this).attr('action');
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
        var token = $('input[name="_token"]').val();
        var method = $("input[name='_method']").val();
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'password': password,
                'password_confirmation': password_confirmation,
                '_token': token,
                '_method': method
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response) {
                    var html = '<p class="font-bold text-green-400 text-center">Change password success! Please try login!</p>';
                    $("#result").html();
                    $("#result").html(html);
                }
            },
            error: function (response) {
                var err = response.responseJSON.password;
                var html = '';
                $.each(err, function (key, value) {
                    html += '<p class="font-bold text-red-500 text-center">' + value + '</p>';
                });
                $("#result").html();
                $("#result").html(html);
            }
        });
    });
});