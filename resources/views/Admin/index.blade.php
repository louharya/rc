@extends('layouts.layoutAdmin')

@section('content')
    <div class="row mt-3">
        @foreach ($orders as $order)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $order->customer_name }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-warning">Quantity:</span> {{ $order->quantity }}
                            </li>
                            <li class="list-group-item">
                                <span>Total Harga:</span> {{ $order->total_price }}
                            </li>
                        </ul>
                        <div class="text-center mt-3">
                            <form action="{{ route('create-invoice', ['id' => $order->id]) }}" method="get">
                                <button type="submit" class="btn btn-primary">Create Invoice</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
