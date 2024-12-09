<?php
include 'config.php'; // Menghubungkan ke database

// Mengambil data dari tabel rekomendasi_transportasi
$query = "SELECT * FROM rekomendasi_transportasi";
$result = mysqli_query($link, $query);

// Menyiapkan data untuk pengkategorian berdasarkan kolom kota
$transportByCity = [];
$allTransport = [];

while ($row = mysqli_fetch_assoc($result)) {
    $cities = explode(',', $row['kota']); // Memisahkan nama kota (jika lebih dari satu kota)
    foreach ($cities as $city) {
        $city = trim($city); // Menghapus spasi ekstra di sekitar nama kota
        if ($city === 'All') {
            $allTransport[] = $row; // Data transportasi dengan kota 'All' disimpan terpisah
        } else {
            if (!isset($transportByCity[$city])) {
                $transportByCity[$city] = [];
            }
            $transportByCity[$city][] = $row; // Menambahkan data transportasi ke kota yang sesuai
        }
    }
}

// Menambahkan data 'All' ke semua kota yang ada
foreach ($transportByCity as $city => $transportations) {
    $transportByCity[$city] = array_merge($transportations, $allTransport);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Transportasi</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Menggunakan gaya CSS yang Anda sebutkan sebelumnya */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0d1c34;
            color: #ffffff;
            line-height: 1.6;
            padding-top: 60px;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #070e1a; 
            padding: 25px 275px;
            position: fixed; 
            top: 0; 
            width: 100%; 
            transition: background-color 0.3s ease; 
            z-index: 1000; 
        }

        .header .container {
            width: 80%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo img {
            height: 80px;
            cursor: pointer;
        }

        .header .right-menu {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-right: 550px; 
            position: relative;
        }

        .header .right-menu .menu-item {
            cursor: pointer;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .header .right-menu .menu-item:hover {
            color: #d3d3d3;
        }

        .menu-item i {
            margin-left: 5px; 
        }

        .support-popup {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            transform: translateY(10px);
            background-color: #070e1a;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            width: 160px;
            z-index: 10;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .support-popup.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .support-popup a {
            display: block;
            padding: 8px 0;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .support-popup a:hover {
            background-color: #f1f1f1;
        }

        .containerr {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        h1, h2 {
            color: #ffffff;
            text-align: center;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #1c2a48;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #2c3e50;
        }

        table td {
            background-color: #34495e;
        }

        .price {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background: #ffffff;
            color: #0d1c34;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px 30px;
            border-radius: 8px;
            margin-top: 20px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            text-decoration: none;
            color: #ffffff;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header class="header">
  <div class="container">
    <a href="index.php">
      <div class="logo">
        <img src="logo.png" alt="Logo">
      </div>
    </a>

    <div class="right-menu">
      <div class="menu-item" id="support">
        Support <i class="fas fa-caret-down"></i>
      </div>
      <div class="support-popup" id="supportPopup">
        <a href="helpcenter.php" class="menu-item"><i class="fas fa-comment"></i>   Help Center</a>
        <a href="faq.php" class="menu-item"><i class="fas fa-question-circle"></i>   FAQ</a>
      </div>

      <a href="peta.php" class="menu-item">Peta <i class="fas fa-map"></i></a>
      <a href="kalkulator.php" class="menu-item">Kalkulator Wisata <i class="fas fa-calculator"></i></a>
    </div>
  </div>
</header>

<div class="containerr">
    <?php
    // Tampilkan tabel per kota
    foreach ($transportByCity as $city => $transportations) {
        echo "<h2>$city</h2>";
        echo "<table>
                <thead>
                    <tr>
                        <th>Nama Transportasi</th>
                        <th>Jenis Transportasi</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($transportations as $transport) {
            echo "<tr>
                    <td>{$transport['nama_transportasi']}</td>
                    <td>{$transport['jenis_transportasi']}</td>
                    <td>{$transport['deskripsi']}</td>
                    <td>IDR " . number_format($transport['harga'], 0, ',', '.') . "</td>
                  </tr>";
        }

        echo "</tbody></table>";
    }
    ?>
</div>

<script>
    const supportMenu = document.getElementById('support');
    const supportPopup = document.getElementById('supportPopup');

    supportMenu.addEventListener('click', function(event) {
        event.stopPropagation();
        supportPopup.classList.toggle('show');
    });

    window.addEventListener('click', function(event) {
        if (!supportMenu.contains(event.target) && !supportPopup.contains(event.target)) {
            supportPopup.classList.remove('show');
        }
    });
</script>
</body>
</html>
