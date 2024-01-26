@extends('layouts.layoutAdmin')

@section('content')

<h1>Daftar Produk</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>

<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ asset('imageProduct/' . $product->image) }}" width="100px">

                </td>
                <td>{{ substr($product->description, 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}
                </td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary m-2">Edit</a>
                        <a href="{{ route('products.update', $product->id) }}" class="btn btn-success m-2">Show</a>
                    </div>
                    {{-- Tombol Delete disini --}}
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection

