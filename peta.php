<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta - Travacation</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            height: 100vh; /* Menggunakan tinggi viewport */
            background-color: #f0f0f0; /* Warna latar belakang */
        }

        .sidebar {
            width: 30px; /* Lebar sidebar */
            background-color: #0d1c34; /* Warna latar belakang sidebar */
            position: fixed; /* Memperbaiki posisi sidebar */
            right: 0; /* Menempatkan sidebar di sebelah kanan */
            top: 0; /* Menempatkan sidebar di bagian atas */
            height: 100%; /* Memenuhi tinggi viewport */
            z-index: 1000; /* Pastikan sidebar berada di atas elemen lain */
            padding: 20px; /* Padding untuk sidebar */
        }

        .map-container {
            position: relative;
            flex: 1; /* Membuat kontainer peta mengisi sisa ruang */
            height: 100%; /* Tinggi penuh untuk kontainer peta */
            transition: margin-right 0.3s ease; /* Animasi saat menampilkan sidebar */
        }

        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0; /* Menghapus border iframe */
        }

        .search-container {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%); /* Memusatkan search bar */
    display: flex;
    align-items: center;
    z-index: 1001; /* Pastikan search bar berada di atas elemen lain */
}

.search-wrapper {
    display: flex; /* Mengatur input dan button bersebelahan */
}

.search-container input {
    padding: 10px;
    border: 1px solid #ccc; /* Border untuk input */
    border-radius: 25px 0 0 25px; /* Bentuk pil untuk input, sudut kiri melengkung */
    width: 300px; /* Lebar input */
    outline: none; /* Menghilangkan outline */
}

.search-container button {
    background-color: white; /* Warna tombol */
    border: none; /* Menghilangkan border */
    border-radius: 0 25px 25px 0; /* Sudut melengkung pada sisi kanan */
    padding: 10px; /* Padding untuk tombol */
    cursor: pointer; /* Kursor tangan saat hover */
}

.search-container button i {
    color: black; /* Warna ikon pada tombol */
}

.pill {
    margin-left: 10px; /* Jarak antar pil */
    background-color: white; /* Warna pil */
    color: black; /* Warna teks pil */
    border-radius: 25px; /* Sudut melengkung untuk pil */
    padding: 10px 10px; /* Padding untuk pil */
    display: flex; /* Menampilkan ikon dan teks dalam satu baris */
    align-items: center; /* Memusatkan ikon dan teks secara vertikal */
    cursor: pointer;
}

.pill i {
    margin-right: 5px; /* Jarak antara ikon dan teks */
}

        .sidebar h2 {
            margin: 10px 0; /* Jarak margin untuk judul */
            color: white; /* Warna teks */
            text-align: center; /* Memusatkan teks */
        }

        .menu-item {
            margin: 10px 0; /* Jarak antar item menu */
            color: white; /* Warna item menu */
            cursor: pointer; /* Kursor tangan saat hover */
            text-align: left; /* Memusatkan teks */
            text-decoration: none; /* Menghapus garis bawah */
            display: flex; /* Menampilkan ikon dan teks dalam satu baris */
            align-items: center; /* Memusatkan ikon dan teks secara vertikal */
        }

        .menu-item i {
            margin-bottom: 10px; /* Jarak antara ikon dan teks */
            font-size: 24px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="index.php" class="menu-item"><i class="fas fa-home"></i></a>
        <a href="kalkulator.php" class="menu-item"><i class="fas fa-calculator"></i></a>
    </div>

    <div class="search-container">
    <input type="text" id="search" placeholder="Cari lokasi...">
    <button onclick="searchLocation()"><i class="fas fa-search"></i></button>
    <span class="pill"><i class="fas fa-hotel"></i> Hotel</span>
    <span class="pill"><i class="fas fa-utensils"></i> Restoran</span>
    <span class="pill"><i class="fas fa-camera"></i> Destinasi Wisata</span>
</div>

        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126509.96315807468!2d106.57573079999999!3d-6.1751102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9b70eb7a577%3A0x47e94b26c837b4a3!2sJakarta%20Indonesia!5e0!3m2!1sen!2sid!4v1631749116110!5m2!1sen!2sid"
            allowfullscreen=""
            loading="lazy"></iframe>
    </div>

    <script>
    document.getElementById('search').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            searchLocation();
        }
    });

    function searchLocation() {
        const query = document.getElementById('search').value;
        const url = `https://www.google.com/search?q=${encodeURIComponent(query)}`;
        window.open(url, '_blank'); // Membuka tab baru
    }
</script>

</body>
</html>
