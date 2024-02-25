@extends('layouts.layoutAdmin')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Jumlah Hari Sewa</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                <form action="{{ route('create-invoice', ['id' => $order->id]) }}" method="get">
                                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
