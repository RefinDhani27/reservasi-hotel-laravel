<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pemesanan Hotel</title>
    <style>
        body { font-family: sans-serif; color: #333; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #2c3e50; }
        .header p { margin: 5px 0; color: #7f8c8d; }
        .info-box { width: 100%; margin-bottom: 20px; }
        .info-box td { padding: 5px; vertical-align: top; }
        .table-items { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table-items th, .table-items td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .table-items th { background-color: #f8f9fa; color: #2c3e50; }
        .total-row td { font-weight: bold; background-color: #f8f9fa; }
        .footer { text-align: center; margin-top: 50px; font-size: 0.9em; color: #7f8c8d; border-top: 1px solid #ddd; padding-top: 10px; }
        .status-badge { display: inline-block; padding: 5px 10px; border-radius: 5px; color: white; font-weight: bold; background-color: #27ae60; }
    </style>
</head>
<body>

    <div class="header">
        <h1>INVOICE PEMESANAN</h1>
        <p>Hotel Bintang Lima Nusantara</p>
        <p>Jl. Raya Hotel No. 123, Kota, Indonesia</p>
    </div>

    <table class="info-box">
        <tr>
            <td width="50%">
                <strong>Ditagihkan Kepada:</strong><br>
                {{ $reservation->user->name }}<br>
                {{ $reservation->user->email }}
            </td>
            <td width="50%" style="text-align: right;">
                <strong>No. Pesanan:</strong> #INV-{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }}<br>
                <strong>Tanggal Cetak:</strong> {{ now()->format('d M Y') }}<br>
                <strong>Status:</strong> <span class="status-badge">{{ strtoupper($reservation->status) }}</span>
            </td>
        </tr>
    </table>

    <table class="table-items">
        <thead>
            <tr>
                <th>Deskripsi Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Durasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Tipe {{ $reservation->room->room_type }}</strong><br>
                    Nomor Kamar: {{ $reservation->room->room_number }}
                </td>
                <td>{{ \Carbon\Carbon::parse($reservation->check_in_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->check_out_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->check_in_date)->diffInDays(\Carbon\Carbon::parse($reservation->check_out_date)) }} Malam</td>
            </tr>
            <tr class="total-row">
                <td colspan="3" style="text-align: right;">TOTAL TAGIHAN:</td>
                <td>Rp {{ number_format($reservation->total_price, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Terima kasih telah mempercayakan penginapan Anda di Hotel kami.</p>
        <p>Struk ini adalah bukti pembayaran yang sah.</p>
    </div>

</body>
</html>