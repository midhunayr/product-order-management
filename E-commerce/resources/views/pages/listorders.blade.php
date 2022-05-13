@extends('adminLayout.layout')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <td><a href="{{ route('user.addproductview') }}" class="btn btn-dark btn-sm">Add Product</a>
                            </td>
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Product Details</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Invoice ID</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Net Amount</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $value)
                                            @php
                                                $id = $value->id;
                                                $data = App\Repositories\OrderRepository::getTotalSum($id);
                                            @endphp
                                            <tr id="">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->order_no }}</td>
                                                <td>{{ $value->customer_name }}</td>
                                                <td>{{ $value->customer_phone }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td>{{ $value->created_at }}</td>

                                                <td><a href="{{ route('user.editorder', ['cusid' => $value->id]) }}"><button
                                                            type="button" onclick="" class="btn btn-dark btn-sm"><span
                                                                class='bi bi-pencil'></span></button></a>

                                                    <button type="button" class="btn btn-dark btn-sm deleteRecord"
                                                        data-id="{{ $value->customer_id }}"
                                                        data-href="{{ route('user.deleteorder', ['order' => $value->id]) }}"
                                                        data-url=""><span class="bi bi-trash"></span>
                                                    </button>

                                                    <a href="{{ route('user.printpdf', ['id' => $value->id]) }}"><button
                                                            type="button" onclick="" class="btn btn-dark btn-sm"><span
                                                                class='bi bi-file-pdf'></span></button></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="{{ asset('assets/admin/js/orderlist.js') }}"></script>
@endpush
