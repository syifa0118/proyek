<?php
require 'koneksi.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang  = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $jenis_barang = mysqli_real_escape_string($conn, $_POST['jenis_barang']);
    $harga        = (int) $_POST['harga'];
    $stok         = (int) $_POST['stok'];

    // Handle upload foto
    $foto_name = $_FILES['foto_barang']['name'];
    $foto_tmp  = $_FILES['foto_barang']['tmp_name'];
    $target_dir = "uploads/";
    $foto_path = $target_dir . basename($foto_name);

    if (move_uploaded_file($foto_tmp, $foto_path)) {
        // Simpan data ke database
        $query = "INSERT INTO barang (nama_barang, jenis_barang, harga, stok, foto_barang)
                  VALUES ('$nama_barang', '$jenis_barang', '$harga', '$stok', '$foto_name')";

        if (mysqli_query($conn, $query)) {
            header("Location: tampil_barang.php");
            exit();
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($conn);
        }
    } else {
        $error = "Gagal mengupload gambar.";
    }
}