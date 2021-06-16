$(document).ready(function () {
    $("#create-product").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var product_name = $("#product-name").val();
        var product_quantity = $("#product-quantity").val();
        var product_price = $("#product-price").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'name': product_name,
                'quantity': product_quantity,
                'price': product_price
            },
            dataType: "dataType",
            success: function (response) {
                console.log(response);
                
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
});