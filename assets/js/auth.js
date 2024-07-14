$(document).ready(function() {

    var base = window.location.origin;

    function loading(type, text) {
        if (type == 'on') {
            $('.load').prop("disabled", true).html('<span class="spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true"></span>' + text);
        } else {
            $('.load').prop("disabled", false).text(text);
        }
    }

    function formReset() {
        $(".select2bs4").val(null).trigger('change');
        $(".select2").val(null).trigger('change');
        $('.modal').modal('hide');
        $('#authModal form').trigger("reset");
        //$("formId")[0].reset()
    }

    $('#user_submit').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        if ($('#password').val() === $('#c_password').val()) {
            loading('on', 'অপেক্ষা করুন...')
            let formData = new FormData(this);
            let my_url = base + "/user-create";
            $.ajax({
                type: 'post',
                url: my_url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    loading('off', 'Submit')
                    toastr.success(data.message)
                    formReset();
                },
                error: function(data) {
                    loading('off', 'Submit')
                    toastr.error(data.responseJSON.message)

                }
            });
        } else {
            toastr.error('পাসওয়ার্ড মেলেনি')
        }
    });
    $('#user_forget').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        loading('on', 'পাঠানো হচ্ছে...')
        var my_url = base + "/user-forget";
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                loading('off', 'রিসেট লিঙ্ক পাঠান')
                toastr.success(data.message)
                formReset();
            },
            error: function(data) {
                loading('off', 'রিসেট লিঙ্ক পাঠান')
                toastr.error(data.responseJSON.message)

            }
        });
    });
    $('#log_in').submit(function(e) {
        $(document).find("span.text-danger").remove();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        loading('on', 'লগইন হচ্ছে...')
        var my_url = base + "/login-check";
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data)
                loading('off', 'লগইন করুন')
                // location.reload();
                // window.location = window.location.href

                window.location.href = data.url; /*-- added for redirect user [off line no. 101] --*/
            },
            error: function(data) {
                loading('off', 'আবার চেষ্টা করুন')
                const hit = $('#hit').val()
                $('#hit').val(parseInt(hit) + 1)
                if (parseInt(hit) > 2) {
                    $('#capchaShow').show()
                }
                toastr.error(data.responseJSON.message)
                grecaptcha.reset();
                $.each(data.responseJSON.errors, function(field_name, error) {
                    $(document).find('[name=' + field_name + ']').after('<span class="small err-msg text-danger">' + error + '</span>')
                })

            }
        });
    });
    $('#reset_pass').submit(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);

        var my_url = base + "/reset-user-pass";
        if ($('#password').val() == $('#c_password').val()) {
            loading('on', 'অপেক্ষা করুন..')
            $.ajax({
                type: 'post',
                url: my_url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    window.location.href = '/'
                    loading('off', 'আবার চেষ্টা করুন')

                },
                error: function(data) {
                    loading('off', 'আবার চেষ্টা করুন')
                    toastr.error(data.responseJSON.message)
                }
            });
        } else {
            toastr.error('পাসওয়ার্ড মেলেনি');
        }

    });
    $('#regOpen').on('click', function() {
        loading('off', 'OTP পাঠান');
        $('#reg_sec').removeClass('d-none').addClass('d-block')
        $('#login_sec').removeClass('d-block').addClass('d-none')

        $('#phone_no_div').removeClass('d-none').addClass('d-block')
        $('#otp_number_div').removeClass('d-block').addClass('d-none')
    })
    $('#resetOpen').on('click', function() {
        $('#reset_sec').removeClass('d-none').addClass('d-block')
        $('#login_sec').removeClass('d-block').addClass('d-none')
    })
    $('#otp_verify_change_phone_btn').on('click', function() {
        $('#phone_no_div').removeClass('d-none').addClass('d-block')
        $('#otp_number_div').removeClass('d-block').addClass('d-none')
    })

    $("#send_otp_btn").click(function(e) {
        e.preventDefault();
        loading('on', 'OTP পাঠানো হচ্ছে...');
        var form_data = new FormData($("#siteRegisterForm")[0]);
        $.ajax({
            type: 'POST',
            url: '/registration-otp-send',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: form_data,
            success: function(response) {
                if ((response.errors)) {
                    loading('off', 'OTP পাঠান');
                    if (response.errors.name) {
                        $('.errorName').text(response.errors.name);
                    } else {
                        $('.errorName').text("");
                    }

                }
                if ((response.success)) {
                    loading('off', 'যাচাই করুন');
                    $("#phone_no_div").removeClass("d-block").addClass("d-none");
                    $("#otp_number_div").removeClass("d-none").addClass("d-block");
                    $("#mobileError span").html('');

                }
            },
            error: function(data) {
                loading('off', 'OTP আবার পাঠান');
                $(".validation-errors").html("");
                $.each(data.responseJSON.errors, function(key, value) {
                    var nameId = "#" + key + "Error";
                    $(nameId).append(
                        '<span class="text-danger small err-msg">' + value + "</span>"
                    );
                });
            },
        });
    });
    $("#otp_verify_change_phone_btn").click(function(e) {
        loading('off', 'OTP পাঠান');
        $("#mobile").val('');
        $("#mobileError span").html('');
        // $("#phone_no_div").show();
        $("#mobile").show();
        $("#send_otp_btn").show();
        $("#otp_number_div").hide();
    });

    $("#otp_verify_btn").click(function(e) {
        console.log('verify working');
        e.preventDefault();
        loading('on', 'যাচাই করা হচ্ছে...');
        var form_data = new FormData($("#siteRegisterForm")[0]);
        $.ajax({
            type: 'POST',
            url: '/registration-otp-verify',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: form_data,
            success: function(response) {
                if ((response.errors)) {
                    loading('off', 'যাচাই করুন');
                    $(".validation-errors").html("");
                    $.each(response.errors, function(key, value) {
                        var nameId = "#" + key + "Error";
                        $(nameId).append(
                            '<span class="iq-bg-danger err-msg">' + value + "</span>"
                        );
                    });

                }
                if ((response.success)) {
                    $('#otp_number_div').removeClass('d-block').addClass('d-none')
                    $('#register_details_div').removeClass('d-none').addClass('d-block')
                    loading('off', 'সাইন আপ');
                }
            },
            error: function(data) {
                loading('off', 'যাচাই করুন');
                $(".validation-errors").html("");
                $.each(data.responseJSON.errors, function(key, value) {
                    var nameId = "#" + key + "Error";
                    $(nameId).append(
                        '<span class="text-danger small err-msg">' + value + "</span>"
                    );
                });
            },
        });
    });

    $("#submit_reg_data").click(function(e) {
        console.log('working');
        e.preventDefault();
        loading('on', 'অপেক্ষা করুন...');
        var form_data = new FormData($("#siteRegisterForm")[0]);
        $.ajax({
            type: 'POST',
            url: '/registration-store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: form_data,
            success: function(response) {
                console.log(response);
                if ((response.errors)) {
                    if (response.errors.name) {
                        $('.errorName').text(response.errors.name);
                    } else {
                        $('.errorName').text("");
                    }
                    loading('off', 'আবার চেষ্টা করুন');
                }
                if ((response.success)) {
                    loading('off', 'লগইন করুন');
                    $('#reg_sec').removeClass('d-block').addClass('d-none')
                    $('#login_sec').removeClass('d-none').addClass('d-block')
                }
            },
            error: function(data) {
                loading('off', 'আবার চেষ্টা করুন');
                $(".validation-errors").html("");
                $.each(data.responseJSON.errors, function(key, value) {
                    var nameId = "#" + key + "Error";
                    $(nameId).append(
                        '<span class="text-danger small err-msg">' + value + "</span>"
                    );
                });
            },
        });
    });
});

function loading(type, text) {
    if (type == 'on') {
        $('.load').prop("disabled", true).html('<span class="spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true"></span>' + text);
    } else {
        $('.load').prop("disabled", false).text(text);
    }
}

function openAuthModal(type) {
    console.log(type)
    $('#authModal form').trigger("reset");
    $('.err-msg').remove()
    $('.err-msg2').text('')
    if (parseInt(type) === 1) {
        loading('off', 'লগইন করুন');
        $('#login_sec').removeClass('d-none').addClass('d-block')
        $('#reg_sec').removeClass('d-block').addClass('d-none')
        $('#reset_sec').removeClass('d-block').addClass('d-none')
    }
    if (parseInt(type) === 2) {
        loading('off', 'OTP পাঠান');
        $('#login_sec').removeClass('d-block').addClass('d-none')
        $('#reg_sec').removeClass('d-none').addClass('d-block')
        $('#reset_sec').removeClass('d-none').addClass('d-none')
    }
    $('#authModal').modal('show')
}
/*
 * Validate Bangladeshi mobile number
 * @author: Lincoln Mahmud
 * @company: Purple Patch
 */
function checkNumber() {
    $('.err-msg').remove()
    let c = valid_mobile($('#mobile').val());
    if (c) {
        $('#is_valid_number').text('')
        $('#send_otp_btn').prop("disabled", false)
        $('#mobile').val(c)
    } else {
        if ($('#mobile').val().length >= 11) {
            $('#is_valid_number').text('সঠিক নম্বর ব্যবহার করুন')
        }
        $('#send_otp_btn').prop("disabled", true)
    }
}

function valid_mobile(value) {
    /*When value not number then try to convert bangla to english number*/
    if (isNaN(value)) {
        value = translteBanglaToEngNum(value);
    }
    valid_number = value.match("(?:\\+88|88)?(01[3-9]\\d{8})"); /*Regular expression to validate number*/
    /*When valid return without +88/88 number if exist*/
    if (valid_number) {
        return valid_number[1]; /*valid number method return 3 with actual input*/
    } else {
        return false; /*return false when not valid*/
    }
}

/*
 * Bangla to English number conversion method
 * @author: Lincoln Mahmud
 * @company: Purple Patch
 */

function translteBanglaToEngNum(num_str) {
    var bengali = {
        "০": 0,
        "১": 1,
        "২": 2,
        "৩": 3,
        "৪": 4,
        "৫": 5,
        "৬": 6,
        "৭": 7,
        "৮": 8,
        "৯": 9
    };
    var changed_nun = '';
    num_str.toString().split('').forEach(l => {
        if (isNaN(l)) {
            changed_nun += bengali[l];
        } else {
            changed_nun += l;
        }
    });
    return changed_nun;
}