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
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-6">
                                    <h3 class="card-title"></h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <tbody>

                                        <tr id="">
                                            <td>Order ID</td>
                                            <td>{{ $customer->order_no }}</td>

                                        </tr>
                                        <tr id="">
                                            <td>Products</td>
                                            <td>
                                                @foreach ($order as $key => $value)
                                                    {{ ++$key }} . {{ $value->product->product_name }} X
                                                    {{ $value->quantity }} = {{ $value->total_price }} <br>
                                                @endforeach
                                            </td>

                                        </tr>
                                        <tr id="">
                                            <td>Total</td>
                                            <td>{{ $sum->total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark" onclick="window.print()">Print</button>
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
@endpush
