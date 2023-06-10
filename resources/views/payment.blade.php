@extends('layouts.mainlayout')

@section('title', 'Cart')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
    <link href="{{ asset('css\table.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <br>

    <form action="/process-form" method="POST">
        @csrf

        <h1>Total belanjaan anda : Rp{{ $totalBelanjaan }}</h1>

        <h1><label for="number-input">Jumlah uang diterima: Rp</label>
            <input type="number" id="number-input" name="number" required>
        </h1>

        <hr>

        <h3 class="disabled" id="kembalian">Kembalian : Rp0</h3>

        <button type="submit" class="act-btn" value="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
        $('#number-input').on('input', function() {
            var jumlahUang = parseInt($(this).val());
            var totalBelanjaan = parseInt({{ $totalBelanjaan }});
            var kembalian = jumlahUang - totalBelanjaan;
            $('#kembalian').text('Kembalian: Rp' + kembalian);
        });
    });
    </script>
    {{-- <div class="button-container">
        <a href="history?user={{ $customerID }}" class="act-btn">History</a><br>
        <a href="#" class="act-btn disabled">Cart</a><br>
        <a href="#" class="act-btn disabled">Pay</a>
    </div> --}}

@endsection
