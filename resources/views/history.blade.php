@extends('layouts.mainlayout')

@section('title', 'Menu')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
    <link href="{{ asset('css\table.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>History</h1>
    <h3>Silahkan melihat detail riwayat pemesanan anda</h3><br>

    {{-- @dd($historyList) --}}
    </table>
    <table class="inventory">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyList as $history)
                <tr>
                    <td>{{$history->id}}</td>
                    <td>{{$history->MenuID}}</td>
                    <td>{{$history->Quantity}}</td>
                    <td>{{$history->Status}}</td>
                    <td>{{$history->PaymentID}}</td>
                    <td>{{$history->PaymentDate}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
        {{-- <a href="history" class="act-btn">History</a><br> --}}
        <a href="cart" class="act-btn">Cart</a>
    </div>

@endsection
