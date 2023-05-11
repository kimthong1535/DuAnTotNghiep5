// const { pull } = require("lodash");

$(function () {
    $(".gop").on("click", function () {
        $(".gop").removeClass("active");
        $(this).addClass("active");
    });

    $(".gopp").on("click", function () {
        $(".gopp").removeClass("active");
        $(this).addClass("active");
    });
});
load_address();
function load_address() {
    $(".choose").on("change", function () {
        var action = $(this).attr("id");
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = "";

        if (action == "city") {
            result = "province";
        } else {
            result = "wards";
        }
        $.ajax({
            type: "POST",
            url: route("checkout.load_address"),
            data: {
                action: action,
                ma_id: ma_id,
                _token: _token,
            },
            success: function (data) {
                $("#" + result).html(data);
            },
        });
    });
}

$(document).ready(function () {
    calculate();
    function calculate() {
        $(".calculate_delivery").click(function () {
            var matp = $(".city").val();
            var maqh = $(".province").val();
            var xaid = $(".wards").val();
            var _token = $('input[name="_token"]').val();
            if (matp == "" && maqh == "" && xaid == "") {
                alert("chọn thành phố");
            } else {
                $.ajax({
                    type: "POST",
                    url: route("checkout.calculate_fee"),
                    data: {
                        matp: matp,
                        maqh: maqh,
                        xaid: xaid,
                        _token: _token,
                    },

                    success: function (data) {},
                });
            }
        });
    }
});
check_coupon();
function check_coupon() {
    $(".check_coupon").click(function () {
        var coupon = $(".coupon").val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            type: "POST",
            url: route("check_coupon.check_coupon"),
            data: {
                coupon: coupon,
                _token: _token,
            },
            success: function (data) {
                if (data.success) {
                    swal({
                        title: "",
                        text: "Áp dụng mã giảm giá thành công",
                        icon: "success",
                        button: "ok",
                    });
                }
                if (data.error) {
                    swal({
                        title: "",
                        text: data.error,
                        icon: "error",
                        button: "ok",
                    });
                }
                location.reload();
            },
        });
    });
}

const deleteButtons = [...$(".delete_button")];
// console.log("🚀 ~ file: cart.js ~ line 105 ~ deleteButtons", deleteButtons);
const decButton = [...$(".dec")];
const incButton = [...$(".inc")];
const quantity_number = [...$(".quantity_number")];
const cart_price = [...$(".cart_price")];
// [a,b,c] [d,e,f]
//ad,ae,af,bd,be,bd

for (let i = 0; i < deleteButtons.length; i++) {
    decButton[i].addEventListener("click", function () {
        quantity_number[i].value = Number(quantity_number[i].value) - 1;
        if (quantity_number[i].value < 1) {
            quantity_number[i].value = 1;
        }
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
        location.reload();
    });

    incButton[i].addEventListener("click", () => {
        quantity_number[i].value = Number(quantity_number[i].value) + 1;
        updateQuantity(i, quantity_number[i].value, cart_price[i]);
        location.reload();
    });
}

function updateQuantity(i, quantity, cart_price) {
    var _token = $('input[name="_token"]').val();
    $.ajax({
        type: "POST",
        url: route("cart.update_cart"),
        data: {
            _token: _token,
            index: i,
            quantity: quantity,
        },
        success: function (response) {
            var formatter = new Intl.NumberFormat("en-US");
            cart_price.textContent =
                formatter.format(response.price * quantity) + "₫";
        },
    });
}

function Huydonhang(i){
      var order_code = i;
      var lydo = $('.lydohuydon').val();
    //    alert(id);
    //    alert(lydo);
    //    alert(order_status);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: route("huy.don_hang"),
       method:'POST',
       data:{order_code:order_code, lydo:lydo,_token:_token},
       success:function(data){
        alert('Hủy đơn hàng thành công');
        location.reload();
       }
     });
    }
