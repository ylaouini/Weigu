$('#registerForm').submit(function(e){

    alert('clicked')
    e.preventDefault();
    $('#register-errors').empty()
    const userData = $(this).serializeArray();
    userData.push({'name': 'birth_date', 'value': userData[5].value + '/' + userData[6].value + '/' + userData[4].value});

    $.ajax({
        type : 'POST',
        headers: {
            Accept: "application/json"
        },
        url: '/register',
        data : userData,
        beforeSend: () => {
            $('.register-save span.save').hide();
            $('.register-save span.spinner-border').show();
        },
        success: () => {
            window.location.href = '/home'
        },
        error: (response) => {
            if(response.status == 422) {
                $('#register-errors').css({ display: 'block' })
                let errors = response.responseJSON.errors;
                Object.keys(errors).forEach(function (key) {
                    $("#register-errors").append(`<li class='error-item'>${errors[key][0]}</li>`);
                });
            } else {
                window.location.reload();
            }
            $('.register-save span.save').show();
            $('.register-save span.spinner-border').hide();
        }
    });
});

$('#removeAccount').click(function(e) {
    e.preventDefault();
    $.ajax({
        url: `/users`,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type : 'DELETE',
        headers: {
            Accept: "application/json"
        },
        beforeSend: () => {
            $('.delete-account span#removeAccount').hide();
            $('.delete-account span.spinner-border').show();
        },

        success: (data) => {
            console.error('success');
            data.deleted ? '' : console.error('Error occured!');
            // reload the page
            location.reload(true);
        },
        error: () => {
            console.error('Server error, check your response');
            $('.delete-account span#removeAccount').show();
            $('.delete-account span.spinner-border').hide();
        }
    });

})
