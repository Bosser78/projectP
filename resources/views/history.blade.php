@extends('layouts.master')

@section('content')

    @if (Session::has('loginId'))
        <table id="cart" class="table table-bordered">

            <h1>ยอดรวม ฿{{ $results->sum('price_sale') }}</h1>

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

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

@endsection
