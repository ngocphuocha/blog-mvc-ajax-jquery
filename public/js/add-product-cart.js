$(document).ready(function () {
    $("#add-cart").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var product_name = $("input[name='product_name']").val();
        var price = $("input[name='price']").val();
        var quantity = $("input[name='quantity']").val();
        var token = $("input[name='_token']").val();

        $.ajax({
            type: "post",
            url: url,
            data: {
                'product_name': product_name,
                'price': price,
                'quantity': quantity,
                '_token': token
            },
            dataType: "json",
            success: function (response) {
                toastr.success('Added product to cart');
            },
            error: function (response) {
                console.log('fail');
            }
        });

    });
});