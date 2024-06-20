@extends('layouts.master')

@section('content')




<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
        @font-face {
            font-family: 'THSarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabun.ttf') }}") format('truetype');
        }
        body {
            font-family: "THSarabun";
        }
    </style>

</head>
<body>


<div class="pull-right">
 <a class="btn btn-primary" href="{{route('bill.sale',['download'=>'pdf'])}}">Download PDF</a>
 </div>

<table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($results as $result)
    <tr>
        <td>{{ $result->customer_name }}</td>
        <td>{{ $result->product_name }}</td>
    </tr>
@endforeach --}}
            {{-- @php $total = 0 @endphp --}}
            @if (Session::has('loginId'))
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


                    </tr>
                @endforeach
                 <td colspan="5" class="text-right">
                    <div class="text-center body">
                       <h1>PRICE ${{ $results->sum('price_sale') }}</h1>


 </div>
                </td>
            @endif
        </tbody>

    </table>
</body>
@endsection
