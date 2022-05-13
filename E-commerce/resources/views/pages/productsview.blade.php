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
                            <li class="breadcrumb-item active">Add Order</li>
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

                        <form class="form-horizontal" id="" method="post" action="" name="addorder" data-url="">
                            @csrf
                            <input type="hidden" id="cus_id" name="cus_id" placeholder="Exam Title" class="form-control"
                                value="{{ $customer->id }}">
                            @php $cusid= $customer->id; @endphp

                            @foreach ($products as $key => $value)
                                {{-- <div class="row"> --}}
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-2 col-form-label">{{ ++$key }}.{{ $value->product_name }}
                                        ({{ $value->price }})
                                    </label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            placeholder="quantity" value="1" min="1">
                                    </div>

                                    @php
                                        $id = $value->id;
                                        $data = App\Repositories\OrderRepository::getCustomer($id, $cusid);
                                    @endphp

                                    <div class="col-sm-1">
                                        <a class="btn btn-success proAdd" style="color:white"
                                            data-productid="{{ $value->id }}" data-price="{{ $value->price }}"
                                            data-cusid="{{ $cusid }}"
                                            data-href="{{ route('user.storeproductorder', ['id' => $value->id]) }}"
                                            data-remove="{{ route('user.deleteorderproduct', ['product' => $value->id]) }}">
                                            <i class=""></i>
                                            @if ($data == 0)
                                                Add
                                            @endif
                                            @if ($data == 1)
                                                @php $proAry[] = $id ; @endphp
                                                Remove
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            @endforeach
                            @php
                                if (@$proAry) {
                                    $proid = implode(',', @$proAry);
                                }
                            @endphp
                            <input type="hidden" id="hidQues" value="{{ @$proid }}">
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/admin/js/addorderproduct.js') }}"></script>
@endsection
