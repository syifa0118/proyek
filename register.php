<?php
require 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$no_telepon = $_POST['no_telepon'] ?? ''; 
$email = $_POST['email'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($nama) || empty($no_telepon) || empty($email) || empty($alamat) || empty($password)) {
    die("Semua wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO register (nama, no_telepon, email, alamat, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $no_telepon, $email, $alamat, $hashedPassword);

if ($stmt->execute()) {
    header("Location: assets/login.html");
    exit;
} else {
    echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>