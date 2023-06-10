@extends('layouts.mainlayout')

@section('title', 'Cart')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
    <link href="{{ asset('css\table.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Cart</h1>
    <h3>Silahkan melihat shopping cart anda</h3><br>

    {{-- @dd($historyList) --}}
    </table>
    <table class="inventory">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Payment Status</th>
                <th>Action</th>
                {{-- <th>Payment Method</th>
                <th>Payment Date</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($cartList as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->menuRelation['MenuName'] }}</td>
                    <td>{{ $cart->Quantity }}</td>
                    @if ($cart->Status == 1)
                        <td>Belum Dibayar</td>
                    @elseif ($cart->Status == 2)
                        <td>Transaksi Berhasil</td>
                    @endif
                    {{-- <td>{{$cart->paymentRelation['PaymentName']}}</td> --}}
                    <td><a href="cart-delete/{{$cart->id}}?user={{$customerID}}" class="button">Remove</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
        <a href="history?user={{ $customerID }}" class="act-btn">History</a><br>
        <a href="#" class="act-btn disabled">Cart</a><br>
    </div>

@endsection
