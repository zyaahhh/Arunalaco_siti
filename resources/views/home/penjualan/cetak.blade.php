<!DOCTYPE html>
<html>
<head>
  <title>Cetak Struk Penjualan</title>
  <style>
    body { 
      font-family: Arial, sans-serif; 
      text-align: center; 
      background-color: #f4f4f4;
    }
    .struk { 
      width: 300px; 
      margin: 20px auto; 
      padding: 10px; 
      border: 2px solid #000; 
      border-radius: 5px;
      background-color: #fff;
    }
    hr { 
      border: 1px dashed #000; 
      margin: 5px 0;
    }
    h2 {
      border-bottom: 2px dashed #000;
      padding-bottom: 5px;
      margin-bottom: 10px;
    }
    p {
      margin: 5px 0;
    }
    .total {
      border-top: 2px solid #000;
      margin-top: 10px;
      padding-top: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="struk">
    <h2>Struk Penjualan</h2>

    @foreach($detail_penjualan as $d)
      <p>{{ $d->barang->nama_barang }} x{{ $d->jumlah }}</p>
      <hr>
    @endforeach

    <p class="total"><strong>Total:</strong> Rp {{ number_format($penjualan->total, 0, ',', '.') }}</p>
    <p style="margin-top: 20px;">Terima kasih atas pembelian Anda di Arunala & Co!</p>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
