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

    <form action="/cart-update/{{$customerID}}" method="POST">
        @csrf
        @method('PUT')

        <h1>Total belanjaan anda : Rp{{ $totalBelanjaan }}</h1>

        <h1><label for="number-input">Jumlah uang diterima : Rp</label>
            <input type="number" id="number-input" name="number" value="0" required>
        </h1>

        <h1>
            <h1><label for="payment-method">Metode Pembayaran : </label>
                <select name="payment-method" id="payment-method">
                    @foreach ($payments as $payment)
                        <option value="{{ $payment->id }}">{{ $payment->PaymentName }}</option>
                    @endforeach
                </select>
            </h1>

            <hr>

            <h3 class="disabled" id="kembalian">Kembalian : Rp0</h3>

            <button type="submit" class="act-btn disabled" value="submit" id="payment-button">Submit</button>
    </form>

    <script>
        // function calculateKembalian yang dibuat dalam function (encapsulation) agar script tidak konflik script jQuery lainnya
        function calculateKembalian() {

            var jumlahUang = parseInt($('#number-input').val());
            var totalBelanjaan = parseInt({{ $totalBelanjaan }});

            var kembalian = jumlahUang - totalBelanjaan;
            
            if ((parseInt($('#number-input').val()) - parseInt({{ $totalBelanjaan }})) < 0) {
                    $('#payment-button').addClass('disabled');
                } else {
                    $('#payment-button').removeClass('disabled');
                }

            $('#kembalian').text('Kembalian: Rp' + kembalian);

        }

        $(document).ready(function() {
            $('#number-input').on('input', calculateKembalian);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#payment-method').on('change', function() {
                var selectedPaymentId = $(this).val();
                var numberInput = $('#number-input');

                if (selectedPaymentId == 1) {
                    numberInput.prop('disabled', false);
                    numberInput.val('0');
                } else {
                    numberInput.prop('disabled', true);
                    numberInput.val({{ $totalBelanjaan }});
                }
                calculateKembalian();


            });
        });
    </script>

@endsection
