@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('imageProduct/' . $product->image) }}" class="card-img-top" alt="Image Produk">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Harga: {{ $product->price }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="form-group">
                        <label for="customer_name">Nama</label>
                        <input type="text" name="customer_name" class="form-control" value="{{ $user->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="customer_address">Alamat</label>
                        <input type="text" name="customer_address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="customer_phone">Nomor Telepon</label>
                        <input type="text" name="customer_phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" class="form-control" min="1" required value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label for="subtotal">Subtotal</label>
                        <input type="text" name="subtotal" class="form-control" readonly value="{{ $product->price }}">
                    </div>

                    <div class="form-group">
                        <a href="{{ route('user.home') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
