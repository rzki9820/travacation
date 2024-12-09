<?php
require 'config.php'; // Menggunakan file konfigurasi database Anda
session_start(); // Memulai session

// Memastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mengamankan password dengan hash
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $foto_profil = 'images/ppdefault.jpg'; // Menggunakan foto profil default

    // Validasi jika email sudah terdaftar
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $link->prepare($query); // Ganti $conn dengan $link
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar, gunakan email lain!'); window.location.href='signup.php';</script>";
    } else {
        // Query untuk menambahkan data ke tabel user
        $sql = "INSERT INTO user (email, password, foto_profil, nama_depan, nama_belakang) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql); // Ganti $conn dengan $link
        $stmt->bind_param('sssss', $email, $password, $foto_profil, $nama_depan, $nama_belakang);

        if ($stmt->execute()) {
            // Simpan informasi pengguna di session
            $_SESSION['user_id'] = $link->insert_id; // Ganti $conn dengan $link
            $_SESSION['nama_depan'] = $nama_depan;
            $_SESSION['foto_profil'] = $foto_profil;

            // Redirect ke halaman indexlogged.php
            echo "<script>alert('Signup berhasil! Anda akan diarahkan ke halaman utama.'); window.location.href='indexlogged.php';</script>";
        } else {
            echo "<script>alert('Signup gagal, coba lagi.'); window.location.href='signup.php';</script>";
        }
    }

    // Menutup koneksi
    $stmt->close();
    $link->close(); // Ganti $conn dengan $link
} else {
    header("Location: signup.php");
    exit;
}
?>
