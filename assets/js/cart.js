function actionPlus(id) {
    let c = parseInt($('#qty' + id).val()) + 1
    $('#qty' + id).val(c)
    $('#qty2' + id).val(En2Bn(c))
    $('#err' + id).removeClass('d-block').addClass('d-none')
}

function actionMinus(id, min) {
    const cu = parseInt($('#qty' + id).val());
    if (cu > min) {
        $('#qty' + id).val(cu - 1)
        $('#qty2' + id).val(En2Bn(cu - 1))
    } else {
        $('#err' + id).removeClass('d-none').addClass('d-block')
    }
}

function CactionPlus(id) {
    $.ajax({
        url: "/increase/" + id,
        dataType: 'json',
        success: function(response) {
            // toastr.success(response.message)
            // $('.item_amount_cart').text(response.items)
            getCart()
        }
    })
}

function CactionMinus(id) {
    $.ajax({
        url: "/decrease/" + id,
        dataType: 'json',
        success: function(response) {
            // toastr.success(response.message)
            // $('.item_amount_cart').text(response.items)
            getCart()
        },
        error: function(response) {
            toastr.error(response.responseJSON.message)
        }
    })
}

function removeItem(id) {
    DeleteAsk('remove', id)
    /* $.ajax({
         url:"/remove/"+ id,
         dataType: 'json',
         success: function(response){
            // toastr.success(response.message)
            // $('.item_amount_cart').text(response.items)
             getCart()
         }
     })*/
}

function CustomQty(id) {
    /*  if (event.keyCode == 13){
          $.ajax({
              url:"/update-qty",
              data: {
                  qty: $('#cus_'+id).val(),
                  id: id,
              },
              dataType: 'json',
              success: function(response){
                  // toastr.success(response.message)
                  // $('.item_amount_cart').text(response.items)
                  getCart()
              },
              error: function (response) {
                  toastr.error(response.responseJSON.message)
              }
          })
      }else{*/
    setTimeout(() => {
        $.ajax({
            url: "/update-qty",
            data: {
                qty: $('#cus_' + id).val(),
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                // toastr.success(response.message)
                // $('.item_amount_cart').text(response.items)
                getCart()
            },
            error: function(response) {
                toastr.error(response.responseJSON.message)
            }
        })
    }, 2000);
    //}
}

function CustomQty2(id) {
    if (event.keyCode == 13) {
        $.ajax({
            url: "/update-qty",
            data: {
                qty: $('#cus2_' + id).val(),
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                // toastr.success(response.message)
                // $('.item_amount_cart').text(response.items)
                getCart()
            },
            error: function(response) {
                toastr.error(response.responseJSON.message)
                $('#cus2_' + id).val(response.responseJSON.min_order)
            }
        })
    }
}
$("#id_of_textbox").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#id_of_button").click();
    }
});

function add2Cart(id, min, is_promo = 0) {
    if ($('#qty' + id).val() >= min) {
        $.ajax({
            url: "/add-to-cart",
            data: {
                qty: $('#qty' + id).val(),
                product_id: id,
                is_promo: is_promo,
            },
            dataType: 'json',
            success: function(response) {
                // toastr.success(response.message)
                //  $('.item_amount_cart').text(response.items)
                Swal.fire({
                    position: 'middle',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                getCart()
            },
            error: function(response) {
                if (response.responseJSON.is_not_same_store) {
                    removeAndAdd(id, min, is_promo)
                }
                // toastr.error(response.responseJSON.message)
            }
        })
    } else {
        $('#qty' + id).val(min)
        toastr.error('সর্বনিম্ন অর্ডার: ' + En2Bn(min))
    }
}

function removeAndAdd(id, min, is_promo = 0) {
    Swal.fire({
        title: 'অন্য স্টোরের প্রোডাক্ট ইতিমধ্যে কার্টে আছে, নতুন স্টোরের প্রোডাক্ট কার্টে যোগ করলে আগের স্টোরের প্রোডাক্ট কার্ট থেকে মুছে যাবে।',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'যুক্ত করুন',
        cancelButtonText: 'বন্ধ করুন',
        denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "/empty-cart",
                success: function(response) {
                    add2Cart(id, min, is_promo)
                },
                error: function(response) {
                    toastr.error(response.responseJSON.message)
                }
            })
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

function getCart() {
    $.ajax({
        url: "/get-cart-data",
        dataType: 'json',
        success: function(response) {
            $("#sub_t").text('০.০০ ');
            $("#dis_t").text('০.০০ ');
            $("#del_t").text('০.০০ ');
            $("#pac_t").text('০.০০ ');
            if (response.total == '০') {
                $('.item_amount_cart2').text('০.০০ ')
                $('.item_amount_cart').addClass('d-none').removeClass('d-block')
            } else {
                $('.item_amount_cart').text(response.total)
                $('.item_amount_cart2').text(response.total)
                $('.item_amount_cart').removeClass('d-none').addClass('d-block')
            }

            $('.cart-list').empty();
            if (response.data.length > 0) {
                response.data.forEach((element, index) => {
                    console.log(element)
                    $('.cart-list').append(' <li class="cart-item">\n' +
                        '            <div class="cart-media"><a href="#">\n' +
                        '                    <img src="' + element.image + '" alt="product"></a>\n' +
                        '                <button onclick="removeItem(' + element.id + ')" class="cart-delete"><i class="far fa-trash-alt"></i></button>\n' +
                        '            </div>\n' +
                        '            <div class="cart-info-group">\n' +
                        '                <div class="cart-info">\n' +
                        '                    <h6><a href="' + element.url + '">' + element.name + '</a></h6>\n' +
                        '                    <p>পরিমাণ: ' + element.quantity_bn + ' ' + element.unit + '</p>\n' +
                        '                </div>\n' +
                        '                <div class="cart-action-group">\n' +
                        '                    <div class="product-action">\n' +
                        '                        <button class="action-minus" onclick="CactionMinus(' + element.id + ')" title="পরিমাণ বিয়োগ"><i class="fas fa-minus"></i></button>\n' +
                        '                        <input disabled class="action-input" onkeyup="CustomQty(' + element.id + ')" id="cus_' + element.id + '" title="পরিমাণ সংখ্যা" type="hidden" name="quantity" value="' + element.quantity + '">\n' +
                        '                        <input disabled class="action-input" onkeyup="CustomQty(' + element.id + ')" id="cus2_' + element.id + '" title="পরিমাণ সংখ্যা" type="text" name="quantity2" value="' + En2Bn(element.quantity) + '">\n' +
                        '                        <button class="action-plus" onclick="CactionPlus(' + element.id + ')" title="পরিমাণ প্লাস"><i class="fas fa-plus"></i></button>\n' +
                        '                    </div>\n' +
                        '                   <h6>' + element.total + ' টাকা</h6>\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </li>')
                })
            } else {
                $('.cart-list').append('     <li>\n' +
                    '            <img style="max-width: 300px" src="/images/product-not-found.png" class="img-fluid mx-auto d-block" alt="product">\n' +
                    '        </li>')
            }
            $(".check-table").load(location.href + " .check-table");
            $("#sub_t").text(response.sub_total);
            $("#dis_t").text(response.discount);
            $("#del_t").text(response.delivery_charge);
            $("#pac_t").text(response.packaging_charge);
            totalCalculation()
        }
    })
}

function SetMainPhoto(img) {
    $('#main_photo').attr('src', img.src)
    console.log(img.src)
}

function SetActive(tar) {
    $('.im_ac').removeClass('active')
    $(tar).addClass('active')
}
getCart();

function DeleteAsk(url, id) {
    Swal.fire({
        title: 'আপনি কি নিশ্চিত ?',
        text: "মুছে ফেলা আইটেম পুনরুদ্ধার করা যাবে না !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'হ্যাঁ, নিশ্চিত !',
        cancelButtonText: 'বাতিল'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/" + url + "/" + id,
                dataType: 'json',
                success: function(response) {
                    Swal.fire(
                        'ধন্যবাদ',
                        'আপনার ফাইল মুছে ফেলা হয়েছে',
                        'success'
                    )
                    getCart()
                }
            })
        }
    })
}

// dropdown filters
function filterDistrict(division_id, district_id = 0, district = null, upazila_id = 0, upazila = null, area_id = 0, area = null) {
    $.ajax({
        type: 'get',
        url: '/get-district-by-division/' + division_id,
        success: function(data) {
            $('#district_id').html(" ");
            $('#upazila_id').html(" ");
            $('#area_id').html(" ");
            $('#district_id').append(data);
            // $('#del_t').text('০')
            if (district_id > 0) {
                $('#' + district).val(district_id).trigger('change')
                filterUpazila(district_id, upazila_id, upazila, area_id, area)
            }
        },
        error: function() {
            console.log('error o');
        }
    });
}

function filterUpazila(district_id, upazila_id = 0, upazila = null, area_id = 0, area = null) {
    $.ajax({
        type: 'get',
        url: '/get-upazila-by-district/' + district_id,
        success: function(data) {
            $('#upazila_id').html(" ");
            $('#area_id').html(" ");
            $('#upazila_id').append(data);
            if (upazila_id > 0) {
                $('#' + upazila).val(upazila_id).trigger('change')
                filterArea(upazila_id, area_id, area)
            }
        },
        error: function() {
            console.log('error o');
        }
    });
}

function filterArea(upazila_id, area_id = 0, area = null) {
    $.ajax({
        type: 'get',
        url: '/get-area-by-upazila/' + upazila_id,
        success: function(data) {
            $('#area_id').html(" ");
            $('#area_id').append(data);
            if (area_id > 0) {
                $('#' + area).val(area_id).trigger('change')
            }
        },
        error: function() {
            console.log('error o');
        }
    });
}

function getDeliveryCharge() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: '/get-delivery-charge',
        data: {
            division_id: $('#division_id').val(),
            district_id: $('#district_id').val(),
            upazila_id: $('#upazila_id').val(),
            area_id: $('#area_id').val(),
        },
        success: function(data) {
            $('#del_t').text(data.delivery_charge_bn)
            totalCalculation()
            btnEnable()
        },
        error: function() {
            console.log('error o');
        }
    });
}

function totalCalculation() {
    const delivery = $('#del_t').text()
    const packing = $('#pac_t').text()
    const discount = $('#dis_t').text()
    const subtotal = $('#sub_t').text()
    const total = parseFloat(Bn2En(subtotal)) + parseFloat(Bn2En(delivery)) - parseFloat(Bn2En(discount)) + parseFloat(Bn2En(packing))
    const bn = En2Bn(total.toFixed(2))
    $('#to_t').text(bn)
    btnEnable()
}

function Bn2En(n) {
    return n.replace(/[০-৯]/g, d => "০১২৩৪৫৬৭৮৯".indexOf(d))
}

function En2Bn(n) {
    return n.toString().replace(/\d/g, d => "০১২৩৪৫৬৭৮৯" [d])
}

function btnEnable() {
    if (parseInt($('#area_id').val()) > 0) {
        if (parseFloat(Bn2En($('#sub_t').text())) > 0) {
            $('#place_order').addClass('active')
        } else {
            $('#place_order').removeClass('active')
        }
    } else {
        $('#place_order').removeClass('active')
    }

}

function OrderPlace() {
    if (parseInt($('#selected_address').val()) > 0) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/order-place',
            data: {
                address_id: $('#selected_address').val(),
                division_id: $('#division_id').val(),
                district_id: $('#district_id').val(),
                upazila_id: $('#upazila_id').val(),
                area_id: $('#area_id').val(),
                address: $('#address_details').val(),
            },
            success: function(data) {
                toastr.success(data.message)
                $('#order_sec').hide()
                $('#after_order_sec').removeClass('d-none').addClass('d-block')
                getCart()
            },
            error: function(response) {
                toastr.error(response.responseJSON.message)
            }
        });
    } else {
        toastr.warning('প্রেরণের ঠিকানা যোগ করুন')
    }
}

function DirectOrderPlace() {
    if (parseInt($('#selected_address').val()) > 0) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/direct-order-place',
            data: {
                address_id: $('#selected_address').val(),
                division_id: $('#division_id').val(),
                district_id: $('#district_id').val(),
                upazila_id: $('#upazila_id').val(),
                area_id: $('#area_id').val(),
                address: $('#address_details').val(),
                order_id: $('#order_id').val(),
                offer_id: $('#offer_id').val(),
            },
            success: function(data) {
                toastr.success(data.message)
                $('#order_sec').hide()
                $('#after_order_sec').removeClass('d-none').addClass('d-block')
            },
            error: function(response) {
                toastr.error(response.responseJSON.message)
            }
        });
    } else {
        toastr.warning('প্রেরণের ঠিকানা যোগ করুন')
    }
}