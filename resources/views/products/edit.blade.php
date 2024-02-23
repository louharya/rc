@extends('layouts.layoutAdmin')

@section('content')
<h1>Edit Produk</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Gunakan metode PUT -->

    <div class="mb-3">
        <label for="name" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Gambar Produk</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Produk</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ $product->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Persedian</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
    </div>

    <div class="mb-3">
        <label for "price" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
