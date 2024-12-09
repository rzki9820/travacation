<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Destinasi Wisata Bali</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #0d1c34;
    color: #ffffff;
    margin: 0;
    padding: 0; /* Hapus padding agar tidak ada jarak ekstra */
    display: flex;
    justify-content: center; /* Pusatkan secara horizontal */
    align-items: center; /* Pusatkan secara vertikal */
    min-height: 100vh; /* Pastikan tinggi minimal sesuai dengan viewport */
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
            margin-right: 50px; /* Pushes the logo to the left */
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

.containerr {
    max-width: 800px;
    width: 100%; /* Tambahkan agar lebar container fleksibel */
    padding: 20px;
    background-color: #1c2a48;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Opsional: Tambahkan efek bayangan */
}

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .faq-item {
            margin-bottom: 15px;
        }

        .faq-question {
            background-color: #0d1c34;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .faq-question:hover {
            background-color: #0a1626;
        }

        .faq-answer {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #293a5b;
            border-radius: 5px;
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
    <div class="containerr">
        <h1>FAQ - Pertanyaan Umum</h1>
        <div class="faq-item">
            <div class="faq-question">1. Apa tujuan utama dari website ini?</div>
            <div class="faq-answer">Website ini menyediakan informasi destinasi wisata di Indonesia. Berisi banyak rekomendasi untuk membantu anda merencanakan liburan yang menyenangkan.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">2. Bagaimana cara menggunakan kalkulator wisata?</div>
            <div class="faq-answer">Kalkulator wisata dapat diakses melalui menu "Kalkulator Wisata". Anda dapat menghitung estimasi biaya perjalanan dengan mengisi jarak untuk menghitung konsumsi bahan bakar kendaraan.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">3. Apakah semua destinasi wisata memiliki tour guide?</div>
            <div class="faq-answer">Tidak semua destinasi memiliki tour guide. Kami hanya menampilkan informasi tour guide yang tersedia berdasarkan destinasi tertentu.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">4. Bagaimana cara melihat peta destinasi wisata?</div>
            <div class="faq-answer">Anda dapat melihat peta destinasi wisata melalui menu "Peta" di bagian atas halaman. Peta tersebut membantu menemukan lokasi destinasi yang ingin dikunjungi.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">5. Apakah saya bisa menghubungi tim support?</div>
            <div class="faq-answer">Ya, Anda dapat menghubungi tim support melalui menu "Support" di header. Dengan mengakses Help Center anda dapat menghubungi kami selama jam operasional.</div>
        </div>
    </div>

    <script>
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
       
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                } else {
                    answer.style.display = 'block';
                }
            });
        });
    </script>
</body>
</html>
