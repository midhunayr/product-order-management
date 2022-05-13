    let redirect = $('#editorder').data("url");

        $("#editorder").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: new FormData($(form)[0]),
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.status == 200) {

                        Swal.fire({
                                title: 'Success!',
                                text: 'Do you want to continue',
                                icon: 'success',
                                confirmButtonText: 'ok'
                            })

                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.href = redirect;
                                }
                            })
                    } else {

                        Swal.fire({
                            title: 'Error!',
                            text: 'Do you want to continue',
                            icon: 'error',
                            confirmButtonText: 'ok'
                        })

                    }
                },
                error: function(resp) {
                    console.log(resp);
                    let errors = resp.responseJSON.errors;

                    Object.keys(errors).forEach((item, index) => {
                        $('input[name=' + item + ']')
                            .closest('div')
                            .append('<p class="error" style="color: red">' + errors[item][0] +
                                '</p>')
                    })

                }
            });
        });
