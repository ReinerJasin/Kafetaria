@extends('layouts.mainlayout')

@section('title', 'Menu')

@section('css')
    <link href="{{ asset('css\card.css') }}" rel="stylesheet">
    <link href="{{ asset('css\floating-button.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>List Menu</h1>
    <h3>Silahkan memesan melalui menu berikut</h3><br>

    @foreach ($menuList as $menu)
        <div class="card">
            <img src="images\nasi-goreng.jpg" alt="Nasi Goreng" style="width:100%">
            <div class="content-padding">
                <p class="merchant">AAA</p>
                <h1>Nasi Goreng</h1>
                <p class="price">Rp30.000</p>
                <p>Nasi goreng dengan topping sayur berupa wortel dan daun bawang</p>
                <p><button>Add to Cart</button></p>
            </div>
        </div>
    @endforeach

    <div class="button-container">
        <a href="#" class="act-btn">History</a><br>
        <a href="#" class="act-btn">Cart</a>
    </div>

@endsection
