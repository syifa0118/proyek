<?php
require 'koneksi.php';

// Ambil barang terakhir yang dimasukkan
$sql = "SELECT * FROM barang ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$barang = mysqli_fetch_assoc($result);

// Jika tidak ada data, tampilkan placeholder
if (!$barang) {
    $barang = [
        'nama_barang' => 'Barang Belum Ada',
        'jenis_barang' => '',
        'harga' => 0,
        'foto_barang' => 'default.jpg'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="tambah_barang.css" />
</head>
<body>
  <header class="header">
    <img src="gambar/logo_on-qua.jpeg" alt="logotoko" class="logo logo-toko">
    <div class="search-container">
      <input type="text" placeholder="Search">
      <a href="#"><i class="fa fa-search"></i></a>
    </div>
    <h2>Admin</h2>
    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="..."/></svg>
  </header>

  <div class="icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="..."/></svg>
  </div>

  <div class="container">
  <div class="box">
    <div class="box-2">
      <img src="uploads/<?= $barang['foto_barang'] ?>" alt="<?= $barang['nama_barang'] ?>" style="max-width: 200px;" />
      <p>
        <span><?= htmlspecialchars($barang['nama_barang']) ?></span><br><br>
        Jenis: <?= htmlspecialchars($barang['jenis_barang']) ?><br>
        Harga: Rp <?= number_format($barang['harga'], 0, ',', '.') ?><br><br>
        <strong>Stok:</strong> <?= $barang['stok'] ?> pcs
      </p>
    </div>
  </div>
</div>

  <footer class="footer-distributed">
    <div class="footer-center">
      <div>
        <i class="fa fa-phone"></i>
        <p>+62 821-2777-2811 (Jumhadi)</p>
      </div>
    </div>
    <div class="footer-right">
      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Jl. Raya Celeng Lohbener-Indramayu</span></p>
      </div>
    </div>
  </footer>
</body>
</html>