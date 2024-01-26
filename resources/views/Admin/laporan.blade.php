@extends('layouts.layoutAdmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box-laporan">
                    <h5 class="card-title">Total Stok Terjual</h5>
                    <h2 class="card-text text-warning">{{ $totalSoldItems }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-laporan">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <h2 class="card-text text-warning">Rp.{{ $totalRevenue }}</h2>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Invoice Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->name }}</td>
                            <td>{{ $invoice->adress }}</td>
                            <td>{{ $invoice->quantity }}</td>
                            <td>{{ number_format($invoice->total_price, 2) }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
    </div>
    @endsection
