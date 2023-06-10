@extends('layouts.mainlayout')

@section('title', 'Cart')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
    <link href="{{ asset('css\table.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Ringkasan Pesanan</h1>
    <h3>Silahkan melihat daftar pesanan anda</h3><br>

    {{-- @dd($historyList) --}}
    </table>
    <table class="inventory">
        <thead>
            <tr>
                <th>No.</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                {{-- <th>Payment Method</th>
                <th>Payment Date</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($cartList as $cart)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cart->menuRelation['MenuName'] }}</td>
                    <td>{{ $cart->Quantity }} x {{ $cart->menuRelation['Price'] }}</td>
                    <td>{{ $cart->Quantity * $cart->menuRelation['Price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Total belanjaan anda : Rp{{$totalBelanjaan}}</h1>

    {{-- <div class="button-container">
        <a href="history?user={{ $customerID }}" class="act-btn">History</a><br>
        <a href="#" class="act-btn disabled">Cart</a><br>
        <a href="#" class="act-btn disabled">Pay</a>
    </div> --}}

@endsection
