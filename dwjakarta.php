<?php
// Sertakan file konfigurasi
require_once 'config.php';

// Query untuk mengambil data dari tabel destinasi_wisata
$id_kota = 1; // ID kota untuk Bali
$sql_destinasi = "SELECT nama_destinasi, foto, deskripsi, kategori, jam_operasional, harga_tiket FROM destinasi_wisata WHERE id_kota = $id_kota";
$result_destinasi = mysqli_query($link, $sql_destinasi);

// Query untuk mengambil data dari tabel tour_guide
$id_destinasi = [1, 2];
$sql_tour_guide = "SELECT nama_guide, kontak FROM tour_guide WHERE id_destinasi IN (" . implode(',', $id_destinasi) . ")";
$result_tour_guide = mysqli_query($link, $sql_tour_guide);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata Jakarta</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #0d1c34;
            color: #ffffff;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            padding-top: 200px;
        }

        .header {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #070e1a; 
    padding: 25px 275px;
    position: fixed; /* Tetap di atas saat scroll */
    top: 0; /* Posisi di atas halaman */
    width: 100%; /* Lebar penuh */
    transition: background-color 0.3s ease; /* Transisi halus untuk perubahan warna */
    z-index: 1000; /* Agar tetap di atas konten lainnya */
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
            margin-right: 550px; /* Pushes the logo to the left */
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


        /* Support Popup */
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

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .destinasi-container, .tour-guide {
            max-width: 800px;
            margin: 0 auto;
        }
        .destinasi-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .destinasi-box, .tour-guide {
            background: #1c2a48;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
        }
        .destinasi-box img {
            max-width: 100%;
            height: auto;
            max-height: 150px;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .destinasi-box h3 {
            font-size: 1.2rem;
            margin: 5px 0;
        }
        .destinasi-box p, .tour-guide p {
            font-size: 0.9rem;
            margin: 3px 0;
        }
        .tour-guide {
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .tour-guide hr {
            border: 0.5px solid #ffffff;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="container">
    <a href="index.php">
        <!-- Left Side Logo -->
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        </a>
        <!-- Right Side Menu -->
        <div class="right-menu">
            <!-- Support with Popup -->
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
    <h1>Rekomendasi Destinasi Wisata di Jakarta</h1>
    <div class="destinasi-container">
        <?php if (mysqli_num_rows($result_destinasi) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result_destinasi)): ?>
                <div class="destinasi-box">
                    <img src="<?php echo $row['foto']; ?>" alt="Foto Destinasi">
                    <h3><?php echo $row['nama_destinasi']; ?></h3>
                    <p><strong></strong> <?php echo $row['deskripsi']; ?></p>
                    <p><strong>Kategori:</strong> <?php echo $row['kategori']; ?></p>
                    <p><strong>Jam Operasional:</strong> <?php echo $row['jam_operasional']; ?></p>
                    <p><strong>Harga Tiket:</strong> Rp <?php echo number_format($row['harga_tiket'], 0, ',', '.'); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada destinasi wisata yang tersedia untuk kota ini.</p>
        <?php endif; ?>
    </div>

    <h2>Hubungi Tour Guide Rekomendasi</h2>
    <div class="tour-guide">
        <?php if (mysqli_num_rows($result_tour_guide) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result_tour_guide)): ?>
                <p><strong></strong> <?php echo $row['nama_guide']; ?></p>
                <p><strong>Kontak:</strong> <?php echo $row['kontak']; ?></p>
                <hr>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada tour guide yang tersedia.</p>
        <?php endif; ?>
    </div>
    <script>
        // Toggle Support Popup
        const supportMenu = document.getElementById('support');
        const supportPopup = document.getElementById('supportPopup');

        supportMenu.addEventListener('click', function(event) {
            event.stopPropagation();
            supportPopup.classList.toggle('show');
        });

        // Close Popup when clicking outside
        window.addEventListener('click', function(event) {
            if (!supportMenu.contains(event.target) && !supportPopup.contains(event.target)) {
                supportPopup.classList.remove('show');
            }
        });
        </script>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($link);
?>
