@extends('adminLayout.layout')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><img src="{{ asset('assets/admin/images/logo.png') }}" width="100" height="100" alt="Image">
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="" style="color: black">Home</a></li>
                            <li class="breadcrumb-item active">Edit Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-dark">
                        <div>
                        </div><br>

                        <form class="form-horizontal" id="editorder" method="post"
                            action="{{ route('user.updateorder', ['order' => $order->id]) }}" name="editorder"
                            data-url="{{ route('user.listorders') }}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $order->customer_id }}">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="customername" name="customername"
                                            placeholder="customer name" value="{{ $order->customer_name }}">
                                        <p class="category" style="color: red"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Number</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="number" name="number"
                                            placeholder="number" value="{{ $order->customer_phone }}">
                                        <p class="category" style="color: red"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#ordermodal">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/admin/js/editorder.js') }}"></script>
@endsection
