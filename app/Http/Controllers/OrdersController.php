<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('user.home', compact('orders'));
    }

    public function create(Request $request, $productId)
    {
        $product = Product::find($productId);
        $user = User::find(auth()->id());

        return view('orders.create', compact('product', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_phone' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        Orders::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        // Kurangi stok produk


        return redirect()->route('user.home')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function moveDataFromOrderToInvoice($orderId)
    {
        // Ambil data pesanan berdasarkan ID
        $order = Orders::find($orderId);

        if ($order) {
            // Ambil data produk yang terkait dengan pesanan
            $product = Product::find($order->product_id);

            if ($product) {
                // Membuat entri baru dalam tabel "invoices"
                $invoice = new Invoice();
                $customPrefix = 'INV';

                // Get the current date and time components
                $currentDateTime = date('YmdHis');

                // Combine the prefix, date, and time to create the invoice number
                $invoice->invoice_number = $customPrefix . '-' . $currentDateTime;
                $invoice->name = $order->customer_name;
                $invoice->adress = $order->customer_address;
                $invoice->quantity = $order->quantity;
                $invoice->total_price = $order->total_price;
                $invoice->invoice_date = now(); // Gunakan tanggal saat ini

                // Simpan faktur
                if ($invoice->save()) {
                    // Mengurangi stok produk
                    $product->stock -= $order->quantity;
                    $product->save();

                    // Jika faktur berhasil disimpan dan stok produk dikurangi, Anda dapat menghapus pesanan (opsional)
                    $order->delete();

                    return redirect()->route('laporan')->with('success', 'Data dari pesanan dengan ID ' . $orderId . ' telah dipindahkan ke tabel "invoices" dan stok produk telah diperbarui.');
                } else {
                    return redirect()->route('admin.home')->with('error', 'Gagal membuat faktur untuk pesanan dengan ID ' . $orderId . '.');
                }
            } else {
                return redirect()->route('admin.home')->with('error', 'Produk yang terkait dengan pesanan tidak ditemukan.');
            }
        } else {
            return redirect()->route('admin.home')->with('error', 'Pesanan dengan ID ' . $orderId . ' tidak ditemukan.');
        }
    }

    public function laporan()
    {
        $totalSoldItems = Invoice::sum('quantity');
        $totalRevenue = Invoice::sum('total_price');
        $invoices = Invoice::all();

        return view('Admin.laporan', [
            'totalSoldItems' => $totalSoldItems,
            'totalRevenue' => $totalRevenue,
            'invoices' => $invoices,
        ]);
    }

    public function printReceipt($id)
    {
        // Fetch the invoice data based on the provided ID
        $invoice = Invoice::find($id);

        if (!$invoice) {
            // Handle the case where the invoice with the provided ID is not found
            abort(404);
        }

        // Return the receipt view with the invoice data
        return view('struk', compact('invoice'));
    }
}
