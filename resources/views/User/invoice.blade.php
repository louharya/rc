@extends('layouts.layout')

@section('content')

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Invoice</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Jumlah Hari Sewa</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->invoice_number }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->adress }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->invoice_date }}</td>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
