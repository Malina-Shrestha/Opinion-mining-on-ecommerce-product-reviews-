$(function () {
    $('.alert').delay(5000).slideUp(500);

    $('#confirm_password').change(function () {
        npass = $('#password').val();
        cpass = $(this).val();

        if(npass !== cpass){
            $(this)[0].setCustomValidity('Password does not match.');
        }

        else {
            $(this)[0].setCustomValidity('');
        }

    });

    $('.delete').click(function (e) {
        e.preventDefault();
        form = $(this).parent('form');

        if(confirm('Confirm delete')){
            form.submit();
        }

    });

    if($('#slug').length) {
        $('#name').keyup(function() {
            name = $(this).val();

            base = $('base').attr('href');

            $.get(base+'/get-slug/'+name).done(function (response) {
                $('#slug').val(response.slug);
            });
        });
    }
});
