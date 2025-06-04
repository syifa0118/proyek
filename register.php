<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "on_qua";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'] ?? '';
$telepon = $_POST['nomor_telepon'] ?? '';
$email = $_POST['email'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($nama) || empty($telepon) || empty($email) || empty($alamat) || empty($password)) {
    die("Semua wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

$stmt = $conn->prepare("INSERT INTO pembeli (nama, nomor_telepon, email, alamat, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $nama, $telepon, $email, $alamat, $password);

if ($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "Terjadi kesalahan saat menyimpan data.";
}

$stmt->close();
$conn->close();
?>
