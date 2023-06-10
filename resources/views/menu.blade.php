@extends('layouts.mainlayout')

@section('title', 'Menu')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
@endsection
{{-- @dd($customerID) --}}
@section('content')
    <h1>List Menu</h1>
    <h3>Silahkan memesan melalui menu berikut</h3><br>

    @foreach ($menuList as $menu)
        <div class="card">
            <img src="images\nasi-goreng.jpg" alt="Nasi Goreng" style="width:100%">
            <div class="content-padding">
                {{-- @dd($menu->cafe()) --}}
                <p class="merchant">{{$menu->cafeRelation['CafeName']}}</p>
                <h1>{{$menu->MenuName}}</h1>
                <p class="price">{{$menu->Price}}</p>
                    <p>Nasi goreng dengan topping sayur berupa wortel dan daun bawang</p>
                    <p><a href="/cart-add/{{$customerID}}/{{$menu->id}}?user={{$customerID}}" class="button">Add to Cart</a></p>
            </div>
        </div>
    @endforeach

    <div class="button-container">
        <a href="history?user={{$customerID}}" class="act-btn">History</a><br>
        <a href="cart?user={{$customerID}}" class="act-btn">Cart</a><br>
        <a href="#" class="act-btn disabled">Pay</a>
    </div>

@endsection
