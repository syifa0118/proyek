<?php
session_start();
require 'koneksi.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Email dan password wajib diisi.");
}

$stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("ss", $email, $hashedPassword);

if ($stmt->execute()) {
    header("Location: assets/home.html");
    exit;
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>