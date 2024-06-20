@extends('layouts.master')

@section('content')

    @if (Session::has('loginId'))
        <table id="cart" class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach ($results as $result)
                    <tr rowId="">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">{{ $result->product_name }}<img src=""
                                        class="card-img-top" />
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin"></h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $result->price_sale }}</td>
                        <td>
                            <form action="{{ route('del.cart', ['id' => $result->medis_id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm delete-product">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <div class="text-center">
                            <h1>ยอดชำระรวม ฿{{ $results->sum('price_sale') }}</h1>
                            <a href="{{ url('/about') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue
                                Shopping</a>

                                <a href="{{ url('/bill') }}" class="btn btn-danger checkout-btn">Checkout</a>





                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    @endif

@endsection
