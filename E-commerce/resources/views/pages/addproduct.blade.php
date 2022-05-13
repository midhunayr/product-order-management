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
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-dark">
                        <div>

                        </div><br>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="productform" method="post"
                            action="{{ route('user.storeproduct') }}" name="productform"
                            data-url="{{ route('user.listproduct') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="productname" name="productname"
                                            placeholder="product name">
                                        <p class="question" style="color: red"></p>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="price">
                                        <p class="option_one" style="color: red"></p>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="category" class="form-control" id="category">
                                            <option selected disabled>Choose Category</option>
                                            @foreach ($category as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <div class="fileupload">
                                            <label class="form-label" for="customFile">product image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                            @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/admin/js/productadd.js') }}"></script>
@endsection
