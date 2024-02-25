@extends('layouts.layoutAdmin')

@section('content')
    <div class="container">
        <div class="box-laporan">
            <h5 class="card-title">Total Pendapatan</h5>
            <h2 class="card-text text-warning">Rp.{{ $totalRevenue }}</h2>
        </div>

        <!-- Invoice Table -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Invoice Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->name }}</td>
                        <td>{{ $invoice->address }}</td>
                        <td>{{ $invoice->quantity }}</td>
                        <td>{{ number_format($invoice->total_price, 2) }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>
                            <form action="{{ route('print-receipt', ['id' => $invoice->id]) }}" method="get" target="_blank">
                                <button type="submit" class="btn btn-success">Print Receipt</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
