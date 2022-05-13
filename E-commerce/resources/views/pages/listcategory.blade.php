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
                            <td><a href="{{ route('user.addcategoryview') }}" class="btn btn-dark btn-sm">Add Category</a>
                            </td>
                        </div><br>

                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Category Details</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $value)
                                            <tr id="">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->category }}</td>

                                                <td><a
                                                        href="{{ route('user.editcategory', ['category' => $value->id]) }}"><button
                                                            type="button" onclick="" class="btn btn-dark btn-sm"><span
                                                                class='bi bi-pencil'></span></button></a>

                                                    <button type="button" class="btn btn-dark btn-sm deleteRecord"
                                                        data-id="{{ $value->id }}"
                                                        data-href="{{ route('user.deletecategory', ['category' => $value->id]) }}"
                                                        data-url="{{ route('user.listcategory') }}"><span
                                                            class="bi bi-trash"></span>
                                                    </button>

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
    <script src="{{ asset('assets/admin/js/productlist.js') }}"></script>
@endpush
