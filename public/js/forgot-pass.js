$(document).ready(function () {
    $('#forgot-pass').submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action'); // url action
        var email = $('input[name="email"]').val(); // email field
        var token = $('input[name="_token"]').val(); // token field
        var html = '<h1 class="text-green-400 text-center">Checking</h1>';
        $("#result").html(html);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'email': email,
                '_token': token
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                var html = '<p class="text-center">We have send link reset your password to email: ' + '<span class="font-bold text-red-900">' + response.email + '</span>' + ', please check it!</p>';

                $("#result").html();
                $("#result").html(html);

            },
            error: function (response) {
                if (response) {
                    var err = JSON.parse(response.responseText);
                    console.log(err);

                    var html = '';
                    $.each(err[0], function (key, value) {
                        html += '<p class="text-red-500 text-center font-bold">' + value + '</p>';
                        console.log(html);
                        $("#result").html();
                        $("#result").html(html);
                    });
                }

                // var html = '<p class="text-center">' + 'Email: ' + '<span class="font-bold text-red-900">' + err.email + '</span>' + '. ' + err.error;
                // console.log(html);
                // $("#result").html();
                // $("#result").html(html);

            }
        });
    });
});