$(document).ready(function () {
    $("#send-mail-verify").click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        console.log(url);
        $.ajax({
            type: "GET",
            url: url,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    });
});