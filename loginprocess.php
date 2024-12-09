<?php
require 'config.php'; // Menggunakan file konfigurasi database Anda
session_start(); // Memulai session

// Memastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa email di database
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $link->prepare($query); // Ganti $conn dengan $link
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek jika email ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan informasi pengguna di session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama_depan'] = $user['nama_depan'];
            $_SESSION['foto_profil'] = $user['foto_profil'];

            // Redirect ke halaman indexlogged.php
            echo "<script>alert('Login berhasil! Anda akan diarahkan ke halaman utama.'); window.location.href='indexlogged.php';</script>";
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar!'); window.location.href='login.php';</script>";
    }

    // Menutup koneksi
    $stmt->close();
    $link->close(); // Ganti $conn dengan $link
} else {
    header("Location: login.php");
    exit;
}
?>
