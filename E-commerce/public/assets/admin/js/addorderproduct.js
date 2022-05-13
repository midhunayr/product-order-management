        var proAry=[];
        var productid = $('#hidQues').val();
        if(productid!=''){
        proAry = productid.split(',');
        }
        console.log(proAry);
        console.log(productid);
        console.log('in');

        $(document).on("click", ".proAdd", function (event) {
        event.preventDefault();
        let button = $(this);
        let route = $(this).data("href");
        let quantity=$(this).closest("div.row").find("input[name='quantity']").val();
        let remove = $(this).data("remove");
        let cus_id = $('#cus_id').val();
        let cus_ids = $(this).data('cusid');
        let price = $(this).data('price');
        console.log(cus_ids);
        console.log(remove);
        console.log(quantity);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept' :'application/json'
                    }
                });

                var proid=$(this).attr('data-productid');
                index = proAry.indexOf(proid);
                console.log(index);
                if(index == -1){
                    Swal.fire({
                        title: "Are you sure you wish to add this product?",
                        icon: "warning",
                        showCancelButton: true,
                        customClass: {
                            confirmButton: "btn btn-danger",
                            cancelButton: "btn btn-secondary",
                        },
                        buttonsStyling: true,
                        confirmButtonText: "Yes",
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            proAry.push(proid);

                            $(this).html('Remove');
                            $.ajax({
                                url       : route,
                                type      : "POST",
                                dataType  : 'JSON',
                                // contentType: false,
                                cache     :  false,
                                // processData: false,
                                data      : {cus_id:cus_id,quantity:quantity,price:price},
                                success:function(result)
                                {
                                    console.log(result);
                                    if(result.status==200)
                                    {
                                        button.closest("div.row").find("input[name='quantity']").hide()

                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Do you want to continue',
                                            icon: 'success',
                                            confirmButtonText: 'ok'
                                            })

                                    }
                                    else{
                                        Swal.fire({
                                            icon: 'error',
                                            text: result.message,
                                            customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                            window.location.reload();
                                            }
                                        })
                                    }
                                },

                        }); // Ajax closing
                    },
                });
                }
                else
                {

                    Swal.fire({
                            title: "Are you sure you wish to remove this product?",
                            icon: "warning",
                            showCancelButton: true,
                            customClass: {
                                confirmButton: "btn btn-danger",
                                cancelButton: "btn btn-secondary",
                            },
                            buttonsStyling: true,
                            confirmButtonText: "Yes",
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                                    proAry.splice(index,1);
                                    $(this).html('Add');

                                    $.ajax({
                                    url       : remove,
                                    type      : "GET",
                                    dataType  : 'JSON',
                                    // contentType: false,
                                    cache     :  false,
                                    // processData: false,
                                    data      : {cus_id:cus_id},
                                    success:function(result)
                                    {


                                        if(result.status==200)
                                        {

                                            button.closest("div.row").find("input[name='quantity']").show()

                                            Swal.fire({
                                            title: 'Success!',
                                            text: 'Do you want to continue',
                                            icon: 'success',
                                            confirmButtonText: 'ok'
                                            })


                                        }
                                        else{

                                        Swal.fire({
                                        title: 'Error!',
                                        text: 'Do you want to continue',
                                        icon: 'error',
                                        confirmButtonText: 'ok'
                                        })
                                    }
                                },

                        }); // Ajax closing
                    },
                });
                }
            });
