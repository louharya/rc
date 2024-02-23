@extends('layouts.layoutAdmin')

@section('content')
<h1>Tambah Mobil</h1>

<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nama Mobil</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Gambar Mobil</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Mobil</label>
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Persedian</label>
        <input type="number" class="form-control" id="stock" name="stock">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Harga Sewa</label>
        <input type="number" class="form-control" id="price" name="price">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection

