add_to_cart();
function add_to_cart() {
    $(".add-to-cart").click(function () {
        var id = $(this).data("id");
        var cart_id = $(".cart_id_" + id).val();
        var cart_name = $(".cart_name_" + id).val();
        var cart_images = $(".cart_images_" + id).val();
        var cart_price = $(".cart_price_" + id).val();
        var cart_qty = $(".cart_qty_" + id).val();
        var user_id = $(".user_id_" + id).val();
        var _token = $('input[name="_token"]').val();
        let url_to = $("#url_to").val();
        // console.log()
        $.ajax({
            url: `${url_to}/add-to-cart`,
            method: "POST",
            data: {
                product_id: cart_id,
                name: cart_name,
                price: cart_price,
                images: cart_images,
                user_id: user_id,
                quantity: cart_qty,
                _token: _token,
            },
            success: function (data) {
                swal({
                    title: "",
                    text: "Thêm vào giỏ hàng thành công",
                    icon: "success",
                    button: "ok",
                });
            },
        });
    });
}
order();
let gopp = $(".gopp");

for (let i = 0; i < gopp.length; i++) {
    gopp[i].addEventListener("click", () => {
        // paymentValue(gopp[i].getAttribute("data-value"));
        $("#paymentValue").val(gopp[i].getAttribute("data-value"));
    });
}

function order() {
    $(".send_order").click(function () {
        var fullname = $(".fullname").val();
        var phone = $(".phone").val();
        var email = $(".email").val();
        var address = $(".address").val();
        var note = $(".note").val();
        var feeship = $(".order_fee").val();
        var user_id = $(".user_id_").val();
        var coupon = $(".order_coupon").val();
        var payment = $("#paymentValue").val();
        var images = $(".images").val();
        var matp = $(".matp").val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            type: "POST",
            url: route("checkout.confirm_order"),
            data: {
                fullname: fullname,
                phone: phone,
                email: email,
                address: address,
                note: note,
                user_id: user_id,
                feeship: feeship,
                coupon: coupon,
                payment: payment,
                images: images,
                matp: matp,
                _token: _token,
            },
            success: function (data) {
                swal({
                    title: "",
                    text: "Đặt hàng thành công",
                    icon: "success",
                    button: "ok",
                });
            },
        });
    });
}
search_ajax();
function search_ajax() {
    $("#keywords").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: route("autocomplate_ajax.search"),
                data: { query: query, _token: _token },
                success: function (data) {
                    $("#search_ajax").fadeIn();
                    $("#search_ajax").html(data);
                },
            });
        } else {
            $("#search_ajax").fadeOut();
        }
    });
    $(document).on("click", ".li_search", function () {
        $("#keywords").val($(this).text());
        $("#search_ajax").fadeOut();
    });
}

$(document).ready(function () {
    load_comment();
    function load_comment() {
        var post_id = $(".commemt_post_id").val();
        var user_id = $(".user_id").val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: route("load.commemt"),
            data: { post_id: post_id, _token: _token, user_id: user_id },
            success: function (data) {
                $("#load_commemt").html(data);
            },
        });
    }
    $(".send-commemt").click(function () {
        var commemt = $(".commemt_content").val();
        var post_id = $(".commemt_post_id").val();
        var user_id = $(".user_id").val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: route("send.commemt"),
            data: {
                post_id: post_id,
                user_id: user_id,
                commemt: commemt,
                _token: _token,
            },
            success: function (data) {
                load_comment();
                $(".commemt_content").val("");
            },
        });
    });
});
