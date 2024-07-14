$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip()
    $('.custom-select').select2({
        language: "bn",
        theme: 'bootstrap4',
    });
    $('.custom-select2').select2({
        language: "bn",
    });
    $('#logCheck').on('click', function() {
        $.ajax({
            type: 'GET',
            url: '/check-login',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(response) {
                if (response.is_login) {
                    location.href = '/checkout';
                } else {
                    openAuthModal(1)
                }
            }
        });
    });
});