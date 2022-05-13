$(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


let redirect = $('.deleteRecord').data("url");
$(".deleteRecord").click(function(){
    console.log('hii');
    var id = $(this).data("id");
    var route = $(this).data('href');
    console.log(route);
    console.log(id);

    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax(
    {

        url: route,
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        success: function(response) {
                    if (response.status == 200) {

                        Swal.fire({
                                title: 'Success!',
                                text: 'Do you want to delete',
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
    });

});
