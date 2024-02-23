@extends('layouts.layout')

@section('content')
    <div class="row mt-4">
        <div class="col-sm-9">
            <h3>Daftar Mobil    </h3>
            <span class="badge bg-primary">Mobil    </span>
            <span class="text-secondary">

            </span>
        </div>
        <div class="col-sm-3">
            <form class="row" method="GET" action="">
                <div class="col-sm-8">
                    <input type="text" class="form-control bg-light" name="search" placeholder="Search..." />
                </div>
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-primary w-100" value="Search" />
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        @foreach ($products as $product)
        @if ($product->stock > 0)
        <div class="col-sm-4">
            <div class="card mb-4">
                <img src="{{ asset('imageProduct/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ substr($product->description, 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-warning">Rp. {{ number_format($product->price, 2, ',', '.') }}</span>
                        <span>Persedian {{ $product->stock }}</span>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('orders.create', ['productId' => $product->id]) }}" class="btn btn-warning">Pesan</a>
                        <button type="button" class="btn btn-success ml-2" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                            Detail Mobil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">{{ $product->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $product->description }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
