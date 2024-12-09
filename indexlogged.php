<?php
            session_start();
            // Cek apakah pengguna sudah login
            if (isset($_SESSION['user_id'])) {
                // Menampilkan foto profil pengguna yang login
                $nama_depan = $_SESSION['nama_depan'];
                $foto_profil = $_SESSION['foto_profil'];
                echo "
                ";
            } else {
                // Menampilkan tombol Login dan Signup jika belum login
                echo "
                <a href='login.php' class='menu-item'>Login</a> |
                <a href='signup.php' class='menu-item'>Signup</a>
                ";
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraVacation - ORANG SIGMA PLANNING TRAVELNYA DISINI!</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #0d1c34;
            color: white;
        }

       /* Header Styles */
.header {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0000; /* Transparan di puncak */
    padding: 25px 275px;
    position: fixed; /* Tetap di atas saat scroll */
    top: 0; /* Posisi di atas halaman */
    width: 100%; /* Lebar penuh */
    transition: background-color 0.3s ease; /* Transisi halus untuk perubahan warna */
    z-index: 1000; /* Agar tetap di atas konten lainnya */
}

.header.scrolled {
    background-color: rgba(0, 0, 0, 0.5); /* Hitam transparan saat di-scroll */
}

        .header .container {
            width: 80%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo img {
            height: 80px;
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

        .profile-container {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    position: relative;
}

/* Profile Picture */
.profile-pic {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 2px solid #ffffff;
    object-fit: cover;
}

/* Profile Popup */
.profile-popup {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
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

.profile-popup.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.profile-popup a {
    display: block;
    padding: 8px 0;
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
}

.profile-popup a:hover {
    background-color: #1a2b4d;
}

       /* Welcome and Slider Container Styles */
/* Slider Styles */
.slider {
    position: relative;
    width: 100vw;
    height: 85vh;
    overflow: hidden;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
}

.slider img {
    min-width: 100vw;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Slide Navigation Styles */
.slide-nav {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
}

.slide-nav-li {
    color: white;
    font-size: 16px;
    cursor: pointer;
    padding: 5px 10px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    transition: background-color 0.3s;
}

.slide-nav-li.active,
.slide-nav-li:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

.slide-nav-li span {
    padding: 0 5px;
}


/* Rekomendasi Title Styles */
.recommendation-title {
    text-align: left; /* Align text to the left */
    margin: 20px 225px; /* Add margin for spacing */
}

.recommendation-title h2 {
    font-size: 24px; /* Font size for the title */
    margin: 0; /* Remove default margin */
    font-weight: 500; /* Font weight */
}


        /* Destination Container Styles */
.destination-container {
    max-width: 80%; /* Max width for the destination section */
    margin: 20px auto; /* Center the container */
    position: relative; /* For positioning buttons */
    cursor: pointer;
}

.destination-slider {
    display: flex; /* Use flexbox for layout */
    overflow: hidden; /* Hide overflow */
}

.destination-slider-container {
    display: flex; /* Horizontal layout */
    transition: transform 0.5s ease; /* Transition for sliding effect */
    /* Set the width to accommodate all items */
    width: calc(100% * 5); /* 5 items total */
}

.destination-card {
    min-width: 33.33%; /* Show 3 items at a time */
    box-sizing: border-box; /* Include padding and border in width */
    padding: 10px; /* Padding inside the card */
    text-align: center; /* Center content */
}

.destination-card img {
    width: 100%; /* Full width */
    height: auto; /* Maintain aspect ratio */
    border-radius: 10px; /* Rounded corners for images */
}

/* Price Styles */
.price {
    font-weight: bold; /* Bold font for price */
    margin-top: 5px; /* Space above price */
}

/* Navigation Button Styles */
.nav-button {
    position: absolute; /* Position the buttons */
    top: 35%; /* Center vertically */
    transform: translateY(-50%); /* Center adjustment */
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    border: none; /* Remove border */
    font-size: 24px; /* Button font size */
    cursor: pointer; /* Pointer cursor on hover */
    padding: 10px; /* Padding inside the button */
    border-radius: 5px; /* Rounded corners */
}

#prev {
    left: -35px; /* Position left button */
}

#next {
    right: -35px; /* Position right button */
}


    
        /* Icons */
        .icon {
            margin-right: 8px;
            font-size: 18px;
        }

        /* Login / Signup Button Styles */
        .login-signup {
            display: flex;
            gap: 15px;
        }

        .recommendation-section {
    text-align: center;
    padding: 20px;
}

h2 {
            font-size: 24px;
            margin-bottom: 20px;
            margin-left: 225px;
            font-weight: 500;
        }

        /* Menu Container */
        .menutransport-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            margin-left: 225px;
        }

        .menutransport-item {
            padding: 10px 20px;
            background-color: #1A2936;
            color: #fff;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .menutransport-item:hover {
            background-color: #3b4a5f;
        }

        .menutransport-item.active {
            background-color: #3A506B;
        }

        /* Transportation Box */
        .transportation-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: left;
    gap: 20px;
    margin: 20px 0;
    padding-left: 225px;
    max-width: 100%; /* Sesuaikan lebar kontainer ke 100% */
}

/* Individual transportation box */
.transportation-box {
    flex: 0 0 22%; /* Ubah ke 22% agar maksimal 4 per baris */
    max-width: 19.8%; /* Membatasi lebar maksimum setiap box */
    display: flex;
    align-items: center;
    justify-content: left;
    background-color: #1A2936;
    border-radius: 20px;
    padding: 15px;
    margin-left: 0;
    text-decoration: none;
    color: white;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: left;
    min-width: 200px;
}

.transportation-box img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    margin-right: 15px;
}

.transportation-box p {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

/* Hover effect */
        /* Message */
        .message {
            margin-top: 20px;
            margin-left: 225px;
            font-size: 20px;
            color: white;
        }

        h3 {
    font-size: 24px;
    margin: 20px 0; /* Menambahkan margin di atas dan bawah */
}

.menutransport-more {
    padding: 8px 16px; /* Ukuran tombol lebih kecil */
    background-color: #1A2936;
    color: #fff;
    border-radius: 10px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
    display: inline-block; /* Tombol hanya selebar kontennya */
    text-decoration: none; /* Menghilangkan underline */
}

.more-container {
    text-align: center; /* Memusatkan konten secara horizontal */
}

.menutransport-more:hover {
    background-color: #3b4a5f; /* Menambahkan efek hover untuk interaksi */
}

/* Container untuk destinasi */
.destinationn-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    cursor: pointer;
    gap: 20px;
    margin: 20px 225px; /* Margin kiri dan kanan diatur 225px */
}

.destinationn-box {
    flex: 0 0 19%;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.destinationn-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Menjaga rasio 3:4 */
    transition: transform 0.3s ease;
    transform-origin: center; /* Pusatkan zoom */
}

.destinationn-box p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 600%); /* Tetap di tengah */
    color: white;
    font-weight: bold;
    z-index: 1;
}

/* Hover effect */
.destinationn-box:hover img {
    transform: scale(1.1); /* Zoom in gambar di dalam kontainer */
}

/* Menyesuaikan rasio 3:4 */
.destinationn-box {
    aspect-ratio: 3 / 4; /* Membuat kontainer sesuai rasio */
}

.footer {
    background-color: #070e1a; 
    padding: 20px;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-left {
    display: flex;
    margin-left: 225px;
    gap: 15px;
}

.footer-left .social-icon {
    font-size: 24px; /* Sesuaikan ukuran ikon */
    color: #ffffff; /* Warna ikon */
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-left .social-icon:hover {
    color: #007bff; /* Warna saat di-hover */
}

.footer-right {
    text-align: right; /* Align text to the right */
    margin-right: 225px
}

.pesona-logo {
    width: 300px; /* Set a width for the logo */
    height: auto; /* Maintain aspect ratio */
    margin-left: 5px; /* Space between text and logo */
}
    </style>
</head>
<body>

   <!-- Header -->
<header class="header">
    <div class="container">
        <!-- Left Side Logo -->
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>

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

            <!-- Partnership -->
        
            
            <!-- New Navigation Buttons for Peta and Kalkulator -->
<a href="peta.php" class="menu-item">Peta <i class="fas fa-map"></i></a>
<a href="kalkulator.php" class="menu-item">Kalkulator Wisata <i class="fas fa-calculator"></i></a>

<div class="profile-container" id="profileMenu">
    <img src="<?php echo isset($_SESSION['foto_profil']) ? $_SESSION['foto_profil'] : 'images/ppdefault.jpg'; ?>" alt="Profile Pic" class="profile-pic">
    
    <!-- Profile Popup -->
    <div class="profile-popup" id="profilePopup">
        <a href="user.php"><i class="fas fa-user-edit"></i> Edit Akun</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</header>
  <!-- Welcome and Slider Container -->
  <div class="slider">
    <div class="slider-container">
        <img src="home1.jpg" alt="Homescreen 1">
        <img src="home2.jpg" alt="Homescreen 2">
        <img src="home3.jpg" alt="Homescreen 3">
        <img src="home4.jpg" alt="Homescreen 4">
        <img src="home5.jpg" alt="Homescreen 5">
    </div>
    <div class="slide-nav">
        <div class="slide-nav-li" data-slide-to="0"><span>Bromo</span></div>
        <div class="slide-nav-li" data-slide-to="1"><span>Raja Ampat</span></div>
        <div class="slide-nav-li" data-slide-to="2"><span>Menganti</span></div>
        <div class="slide-nav-li" data-slide-to="3"><span>Ciliwung</span></div>
        <div class="slide-nav-li" data-slide-to="4"><span>Tanah Lot</span></div>
    </div>
</div>

<div class="recommendation-title">
    <h2>Rekomendasi</h2>
</div>

    <!-- Destination Container -->
    <div class="destination-container">
    <div class="destination-slider">
        <div class="destination-slider-container">
            <!-- Destination Card 1 -->
            <div class="destination-card">
                <a href="mandalika.php">
                    <img src="destination1.jpg" alt="Destination 1">
                </a>
                <h3>Tiket Weekend Sirkuit Mandalika</h3>
                <p>Nikmati akhir pekan dengan menyaksikan balap motor internasional Grand Prix Pertamina Indonesia 2023 di Sirkuit Pertamina Mandalika.</p>
                <p class="price">Mulai dari : IDR 250,000</p>
            </div>
            <!-- Destination Card 2 -->
            <div class="destination-card">
                <a href="dewata.php">
                    <img src="destination2.jpg" alt="Destination 2">
                </a>
                <h3>Desa Budaya Dewata</h3>
                <p>Punya rencana ke Bali, tapi belum yakin destinasi mana saja yang mau kamu datangi? Ikut tur ini, Yuk! Tanpa repot, kamu akan diantar menjelajahi cantiknya Pulau Dewata.</p>
                <p class="price">Mulai dari : IDR 2,093,300</p>
            </div>
            <!-- Destination Card 3 -->
            <div class="destination-card">
                <a href="komodo.php">
                    <img src="destination3.jpg" alt="Destination 3">
                </a>
                <h3>Sailing Pulau Komodo</h3>
                <p>Yuk, menjelajahi pulau Komodo di Labuan Bajo. Di sana kamu akan diajak snorkeling melihat keindahan terumbu karangnya yang masih alami, menikmati sunset yang menakjubkan, dan melihat secara langsung Komodo, di Pulau Komodo!</p>
                <p class="price">Mulai dari : IDR 3,223,800</p>
            </div>
            <!-- Destination Card 4 -->
            <div class="destination-card">
                <a href="pulaupari.php">
                    <img src="destination4.jpg" alt="Destination 4">
                </a>
                <h3>Sehari di Pulau Pari</h3>
                <p>Buat kamu orang Jabodetabek yang jenuh sama perkotaan, yuk nyeberang sebentar ke Pulau Pari! Kamu bisa menikmati pantai berpasir putih, air laut yang jernih, sampai kenalan sama penghuni laut di sana. Yuk, ikutan!</p>
                <p class="price">Mulai dari : IDR 180,000</p>
            </div>
            <!-- Destination Card 5 -->
            <div class="destination-card">
                <a href="merbabu.php">
                    <img src="destination5.jpg" alt="Destination 5">
                </a>
                <h3>Trip Pendakian Gunung Merbabu</h3>
                <p>Yuk, jelajahi Gunung Merbabu untuk lihat keindahan dan hirup udara segar pegunungan sambil mendaki! Perjalanan ini dijamin bikin kamu nyaman karena urusan transportasi dan makan sudah diatur. Kamu tinggal menikmati suasana dan pengalamannya. Yuk, pesan sekarang!</p>
                <p class="price">Mulai dari : IDR 450,000</p>
            </div>
        </div>
        <button class="nav-button" id="prev">❮</button>
        <button class="nav-button" id="next">❯</button>
    </div>
</div>


<h2>Rekomendasi Transportasi</h2>
<div class="menutransport-container"></div>
<div class="transportation-container"></div>

<div class="more-container">
    <a href="transportdetail.php" class="menutransport-more">Lihat Detail Transportasi</a>
</div>

</div>

<div class="message" id="otherMessage" style="display: none;">
    Waduh, kami belum punya data buat kota kamu. Tapi yuk, masih ada driver setempat buat jadi partner perjalanan terbaik kamu.
</div>

<h2>Destinasi Pilihan</h2>
<div class="destinationn-container">
    <a href="dwbali.php" class="destinationn-box">
        <img src="images/bali.jpg" alt="Bali">
        <p>Bali</p>
    </a>
    <a href="dwjogja.php" class="destinationn-box">
        <img src="images/jogja.jpg" alt="Jogja">
        <p>Jogja</p>
    </a>
    <a href="dwbandung.php" class="destinationn-box">
        <img src="images/bandung.jpg" alt="Bandung">
        <p>Bandung</p>
    </a>
    <a href="dwjakarta.php" class="destinationn-box">
        <img src="images/jakarta.jpg" alt="Jakarta">
        <p>Jakarta</p>
    </a>
    <a href="dwmalang.php" class="destinationn-box">
        <img src="images/malang.jpg" alt="Malang">
        <p>Malang</p>
    </a>
</div>



    <!-- Main Container -->
    <div class="main-container">
        <div class="separator"></div> <!-- Separator shape -->
        <!-- Content goes here -->
    </div>

    <!-- Footer -->
<footer class="footer">
<div class="footer-left">
    <a href="https://www.instagram.com" target="_blank" class="social-icon">
        <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
    </a>
    <a href="https://www.x.com" target="_blank" class="social-icon">
        <i class="fab fa-twitter"></i> <!-- X (Twitter) Icon -->
    </a>
    <a href="https://www.facebook.com" target="_blank" class="social-icon">
        <i class="fab fa-facebook-f"></i> <!-- Facebook Icon -->
    </a>
    <a href="https://www.tiktok.com" target="_blank" class="social-icon">
        <i class="fab fa-tiktok"></i> <!-- TikTok Icon -->
    </a>
</div>
    <div class="footer-right">
    <p>&copy; 2023 TraVacation. All Rights Reserved.</p>
        <img src="pesonaindonesia.png" alt="Pesona Indonesia" class="pesona-logo"></p>
    </div>
</footer>

    <!-- JavaScript for Popup Toggle and Slider -->
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

        const sliderContainer = document.querySelector('.slider-container');
const slideNavItems = document.querySelectorAll('.slide-nav-li');
let currentIndex = 0;
const totalSlides = slideNavItems.length;

// Toggle Profile Popup
const profileMenu = document.getElementById('profileMenu');
    const profilePopup = document.getElementById('profilePopup');

    profileMenu.addEventListener('click', function(event) {
        event.stopPropagation();
        profilePopup.classList.toggle('show');
        supportPopup.classList.remove('show'); // Tutup popup support jika terbuka
    });

    // Close Popups when clicking outside
    window.addEventListener('click', function(event) {
        if (!supportMenu.contains(event.target) && !supportPopup.contains(event.target)) {
            supportPopup.classList.remove('show');
        }
        if (!profileMenu.contains(event.target) && !profilePopup.contains(event.target)) {
            profilePopup.classList.remove('show');
        }
    });

// Fungsi untuk memperbarui slider berdasarkan index
function goToSlide(index) {
    sliderContainer.style.transform = `translateX(-${index * 100}vw)`;
    slideNavItems.forEach(nav => nav.classList.remove('active'));
    slideNavItems[index].classList.add('active');
}

// Pindah ke slide berikutnya setiap 5 detik
const autoSlide = setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop kembali ke awal jika sudah mencapai slide terakhir
    goToSlide(currentIndex);
}, 3000); // Ubah nilai 5000 menjadi waktu (dalam milidetik) sesuai yang diinginkan

// Berhenti auto-slide saat pengguna memilih slide tertentu dan memperbarui slide
slideNavItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        clearInterval(autoSlide); // Hentikan sementara auto-slide
        currentIndex = index; // Perbarui index ke yang dipilih
        goToSlide(currentIndex);

autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % slideNavItems.length;
            goToSlide(currentIndex);
        }, 3000); 
    });
});


        // JavaScript for Destination Slider
let currentDestinationIndex = 0;
const destinationSliderContainer = document.querySelector('.destination-slider-container');
const destinationCards = document.querySelectorAll('.destination-card');
const totalDestinations = destinationCards.length;

// Function to update the slider based on the current index
function updateSlider() {
    const offset = -currentDestinationIndex * (100 / 3); // Calculate offset for sliding effect
    destinationSliderContainer.style.transform = `translateX(${offset}%)`; // Apply the sliding effect
}

// Function to navigate to the next set of cards
document.getElementById('next').addEventListener('click', function() {
    if (currentDestinationIndex < totalDestinations - 3) {
        currentDestinationIndex += 1; // Move to the next
    }
    updateSlider(); // Update the slider position
});

// Function to navigate to the previous set of cards
document.getElementById('prev').addEventListener('click', function() {
    if (currentDestinationIndex > 0) {
        currentDestinationIndex -= 1; // Move to the previous
    }
    updateSlider(); // Update the slider position
});

// Menangani scroll untuk mengubah warna header dan function container
window.addEventListener('scroll', function() {
        const header = document.querySelector('.header');
        const functionContainer = document.querySelector('.function-container');
        
        if (window.scrollY > 0) {
            header.classList.add('scrolled');
            functionContainer.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
            functionContainer.classList.remove('scrolled');
        }
    });

    document.addEventListener("DOMContentLoaded", async () => {
    const menuContainer = document.querySelector('.menutransport-container');
    const transportContainer = document.querySelector('.transportation-container');

    // Mengambil data dari `getTransportData.php`
    const response = await fetch('getTransportData.php');
    const data = await response.json();

    const cities = data.cities;
    const transportData = data.transportData;

    // Membuat menu kota
    cities.forEach(city => {
        const menuItem = document.createElement('div');
        menuItem.className = 'menutransport-item';
        menuItem.textContent = city;
        menuItem.dataset.city = city.toLowerCase();
        
        if (menuContainer.children.length === 0) {
            menuItem.classList.add('active');
            loadTransportData(city.toLowerCase());
        }

        menuItem.addEventListener('click', () => {
            document.querySelectorAll('.menutransport-item').forEach(item => item.classList.remove('active'));
            menuItem.classList.add('active');
            loadTransportData(city.toLowerCase());
        });

        menuContainer.appendChild(menuItem);
    });

    // Fungsi untuk memuat daftar transportasi berdasarkan kota yang dipilih
    function loadTransportData(city) {
    transportContainer.innerHTML = ''; 
    const cityData = transportData[city] || [];

    cityData.forEach(item => {
        const transportBox = document.createElement('div');
        transportBox.className = 'transportation-box';
        
        // Membuat elemen gambar
        const transportImage = document.createElement('img');
        transportImage.src = item.photo; // Mengambil URL gambar dari data
        transportImage.alt = item.name;
        transportImage.className = 'transport-image'; // Tambahkan kelas CSS jika perlu

        const transportTitle = document.createElement('h4');
        transportTitle.textContent = item.name;

        // Masukkan gambar dan judul ke dalam box
        transportBox.appendChild(transportImage);
        transportBox.appendChild(transportTitle);

        transportContainer.appendChild(transportBox);
    });
}
});

// Load default city (Jakarta) on page load
displayTransport('jakarta');

    </script>

</body>
</html>
