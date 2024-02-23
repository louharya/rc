<!-- resources/views/invoices/receipt.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .receipt-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .receipt-header {
            text-align: center;
        }

        .receipt-details {
            margin-top: 20px;
        }

        .receipt-button {
            text-align: center;
            margin-top: 20px;
        }

        /* Hide the button when printing */
        @media print {
            .receipt-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container receipt-container">
        <div class="receipt-header">
            <h3 class="display-9">Struk Pembayaran</h3>
        </div>

        <div class="receipt-details">
            <p>Invoice Number: {{ $invoice->invoice_number }}</p>
            <p>Customer Name: {{ $invoice->name }}</p>
            <p>Address: {{ $invoice->address }}</p>
            <p>Quantity: {{ $invoice->quantity }}</p>
            <p>Total Price: Rp.{{ number_format($invoice->total_price, 2) }}</p>
            <p>Invoice Date: {{ $invoice->invoice_date }}</p>
        </div>

        <div class="receipt-button">
            <button class="btn btn-primary" onclick="printReceipt()">Print Receipt</button>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>
