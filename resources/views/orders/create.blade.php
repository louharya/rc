@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('imageProduct/' . $product->image) }}" class="card-img-top" alt="Image Produk">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Harga: {{ number_format($product->price, 2, ',', '.') }}</p>
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
                        <label for="quantity">Jumlah Hari</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label for="subtotal">Subtotal</label>
                        <input type="text" name="subtotal" id="subtotal" class="form-control" readonly value="{{ number_format($product->price, 2, ',', '.') }}">
                    </div>

                    <div class="form-group">
                        <a href="{{ route('user.home') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the quantity input
        document.getElementById('quantity').addEventListener('input', function () {
            // Get the quantity value
            var quantity = this.value;

            // Calculate the subtotal
            var subtotal = quantity * {{ $product->price }}; // Assuming $product->price is the unit price

            // Update the subtotal input
            document.getElementById('subtotal').value = subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        });
    </script>
@endsection
