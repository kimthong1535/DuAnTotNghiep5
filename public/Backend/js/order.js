$(document).ready(function () {
    order();
    function order() {
        $(".order_detail").change(function () {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();
            // lấy số lượng
            quantity = [];
            $("input[name='product_sales_quantity']").each(function () {
                quantity.push($(this).val());
            });
            // product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function () {
                order_product_id.push($(this).val());
            });
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                // số lượng order
                var order_qty = $(".order_qty_" + order_product_id[i]).val();
                // số lượng tồn kho
                var order_qty_storage = $(
                    ".order_qty_storage_" + order_product_id[i]
                ).val();
                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    $(".color_qty_" + order_product_id[i]).css(
                        "background",
                        "red"
                    );
                }
            }
            if (j == 0) {
                $.ajax({
                    type: "POST",
                    url: route("update.order"),
                    data: {
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id,
                        _token: _token,
                    },
                    success: function (data) {
                        alert("cập nhập thành cống");
                        location.reload();
                    },
                });
            }
        });
    }
});
