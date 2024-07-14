// Working on Mouse sensitivity ;)
$(window).on("scroll", (function() {
        $(this).scrollTop() > 130 ? $(".payment-details").addClass("active") : $(".payment-details").removeClass("active")
    })),
    // Script for cart backdrop
    $(".header-cart").on("click", (function() {
        $("body").css("overflow", "hidden"), $(".dam-cart-sidebar").addClass("active"), $(".backdrop").fadeIn(), $(".cart-close, .backdrop").on("click", (function() {
            $("body").css("overflow", "inherit"), $(".dam-cart-sidebar").removeClass("active"), $(".backdrop").fadeOut()
        }))
    })),

    // Script for active or inactive class
    $(".payment-card").on("click", (function() {
        $(".payment-card").toggleClass("active")
    }))

function OpenCart() {
    $('.dam-cart-sidebar').addClass('active')
}

function CloseCart() {
    $('.dam-cart-sidebar').removeClass('active')
}

function minusCart(id) {
    $.ajax({
        url: "/minus-cart-data",
        data: {
            qty: $('#qty' + id).val(),
            product_id: id,
        },
        dataType: 'json',
        success: function(response) {
            toastr.success(response.message)
            $('.item_amount_cart').text(response.items)
        }
    })
}

// Search Bar & Toggle
$('#toggle-search').on('click', function() {
    $('#searchBar').toggle('display: inline-block');
    $('#closeSearch').toggle('display: inline-block');
});
$('#closeSearch').on('click', function() {
    $('#searchBar').toggle('display: none');
    $('#closeSearch').toggle('display: none');
});