<?php
include("config.php"); // Koneksi ke database
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Mendapatkan data user berdasarkan session
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE id = ?";
$stmt = $link->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hapus_akun'])) {
        // Logika Hapus Akun
        $deleteQuery = "DELETE FROM user WHERE id = ?";
        $stmt = $link->prepare($deleteQuery);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        // Hapus sesi dan redirect ke halaman utama
        session_destroy();
        echo "<script>alert('Akun berhasil dihapus!'); window.location.href='index.php';</script>";
        exit;
    } else {
        // Mengambil data dari form
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $password = $_POST['password'];

        // Mengupdate data nama
        $updateQuery = "UPDATE user SET nama_depan = ?, nama_belakang = ? WHERE id = ?";
        $stmt = $link->prepare($updateQuery);
        $stmt->bind_param('ssi', $nama_depan, $nama_belakang, $user_id);
        $stmt->execute();

        // Mengupdate password jika diisi
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $updatePasswordQuery = "UPDATE user SET password = ? WHERE id = ?";
            $stmt = $link->prepare($updatePasswordQuery);
            $stmt->bind_param('si', $hashedPassword, $user_id);
            $stmt->execute();
        }

        // Mengunggah dan mengupdate foto profil
        if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] === UPLOAD_ERR_OK) {
            $fotoProfil = $_FILES['foto_profil']['name'];
            $fotoTmp = $_FILES['foto_profil']['tmp_name'];
            $fotoPath = 'images/' . $fotoProfil;
            move_uploaded_file($fotoTmp, $fotoPath);

            $updateFotoQuery = "UPDATE user SET foto_profil = ? WHERE id = ?";
            $stmt = $link->prepare($updateFotoQuery);
            $stmt->bind_param('si', $fotoPath, $user_id);
            $stmt->execute();
        }

        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='user.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Pengguna</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #1a2b4d;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 0;
        }

        .popup-container {
            position: relative;
            width: 320px;
            background-color: #0d1c34;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px;
            z-index: 1;
            text-align: center;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: #c1c1c1;
        }

        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #44577c;
            border-radius: 5px;
            background-color: #1a2b4d;
            color: white;
        }

        .input-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #ff4b5c;
        }

        .btn-delete:hover {
            background-color: #e63946;
        }
    </style>
    <script>
        function confirmDeletion() {
            return confirm('Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.');
        }
    </script>
</head>
<body>
    <div class="blur-background"></div>
    <div class="popup-container">
        <h2>Edit Profil Pengguna</h2>
        <form action="user.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" value="<?= htmlspecialchars($user['nama_depan']) ?>" required>
            </div>
            <div class="input-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" value="<?= htmlspecialchars($user['nama_belakang']) ?>" required>
            </div>
            <div class="input-group">
                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password" placeholder="********">
            </div>
            <div class="input-group">
                <label for="foto_profil">Foto Profil</label><br>
                <img src="<?= htmlspecialchars($user['foto_profil']) ?>" alt="Foto Profil" width="100">
                <input type="file" name="foto_profil" id="foto_profil">
            </div>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <button type="submit" name="hapus_akun" class="btn-submit btn-delete" onclick="return confirmDeletion();">Hapus Akun</button>
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$link->close();
?>
