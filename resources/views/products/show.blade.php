@extends('layouts.layoutAdmin')

@section('content')

<h1>Detail Produk</h1>

<div class="row">
    <div class="col-sm-4">
        <img src="{{ asset('imageProduct/' . $product->image) }}" width="100%">
    </div>
    <div class="col-sm-8">
        <h3 class="my-3">{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Persedian: {{ $product->stock }}</p>
        <p>Harga: Rp. {{ $product->price }}</p>
    </div>
</div>

@endsection
