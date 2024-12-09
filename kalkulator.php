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
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #0d1c34;
            color: white;
            padding-top: 80px;
        }

       /* Header Styles */
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

        .containerr {
            background-color: #070e1a;
            color: var(--text-color);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: 20px auto;
            margin-top: 150px;
            padding: 40px;
            transition: transform 0.3s;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        .menu {
            background-color: #0d1c34;
            color: white;
            padding: 15px;
            border-radius: 12px;
            cursor: pointer;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .menu:hover {
            background-color: #3498db;
        }

        .menu-options {
            display: none;
            margin-top: 10px;
        }

        .menu-options button {
            background-color: #f3f4f6;
            color: #374151;
            padding: 12px;
            width: 100%;
            border: none;
            margin-top: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .menu-options button:hover {
            background-color: #3498db;
        }

        .input-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 16px;
            color: var(--text-color);
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="number"], input[type="range"] {
            width: 93%;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="range"] {
            padding: 5px;
        }

        input[type="number"]:focus, input[type="range"]:focus {
            border-color: var(--primary-color);
        }

        button.calculate-btn {
            background-color: #0d1c34;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        button.calculate-btn:hover {
            background-color: #3498db;
        }

        .result-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.result-container {
  background-color: #1A2936;
  color: white;
  padding: 20px;
  border-radius: 12px;
  max-width: 400px;
  width: 100%;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.close-btn {
  background-color: #070e1a;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 20px;
}

.close-btn:hover {
  background-color: #0d1c34;
}

        #vehicleIcon {
            font-size: 48px;
            text-align: center;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 24px;
            }

            input[type="number"], button.calculate-btn {
                padding: 12px;
                font-size: 14px;
            }
        }



.footer {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
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
      
      <!-- New Navigation Buttons for Peta and Kalkulator -->
      <a href="peta.php" class="menu-item">Peta <i class="fas fa-map"></i></a>
      <a href="kalkulator.php" class="menu-item">Kalkulator Wisata <i class="fas fa-calculator"></i></a>
    </div>
  </div>
</header>

<div class="containerr">
        <h1>Kalkulator Biaya Perjalanan</h1>

        <div id="vehicleIcon">🏍️</div>

        <div class="menu" onclick="toggleMenu()">
            Pilih Jenis Kendaraan
        </div>

        <div class="menu-options" id="menu-options">
            <button onclick="selectVehicle('motor')">Motor</button>
            <button onclick="selectVehicle('mobil')">Mobil</button>
        </div>

        <div class="input-group">
            <label for="distance">Jarak (km):</label>
            <input type="number" id="distance" placeholder="Masukkan jarak dalam kilometer" min="0">
        </div>

        <div class="input-group">
            <label for="sliderDistance">Atau gunakan slider:</label>
            <input type="range" id="sliderDistance" min="0" max="500" value="0" oninput="updateDistance()">
            <p id="sliderValue">0 km</p>
        </div>

        <button class="calculate-btn" onclick="calculateFuel()">Hitung</button>

        <div class="result-popup" id="result-popup">
  <div class="result-container">
    <p id="resultText"></p>
    <button class="close-btn" onclick="closeResultPopup()">Tutup</button>
  </div>
</div>
    </div>

    <!-- Footer -->


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

        let currentVehicle = localStorage.getItem('vehicle') || 'motor';

        function toggleMenu() {
            const menuOptions = document.getElementById('menu-options');
            menuOptions.style.display = menuOptions.style.display === 'none' || menuOptions.style.display === '' ? 'block' : 'none';
        }

        function selectVehicle(vehicle) {
            currentVehicle = vehicle;
            const vehicleIcon = document.getElementById('vehicleIcon');
            vehicleIcon.textContent = vehicle === 'motor' ? '🏍️' : '🚗';
            const menu = document.querySelector('.menu');
            menu.textContent = vehicle === 'motor' ? 'Motor' : 'Mobil';
            localStorage.setItem('vehicle', vehicle);
            toggleMenu();
        }

        function calculateFuel() {
  const distance = parseFloat(document.getElementById('distance').value);
  if (isNaN(distance) || distance <= 0) {
    alert('Mohon masukkan jarak yang valid!');
    return;
  }
  
  const divisor = currentVehicle === 'motor' ? 30 : 10;
  const fuelNeeded = distance / divisor;
  const fuelPrice = currentVehicle === 'motor' ? 15000 : 15000; // Harga per liter

  const resultTextElement = document.getElementById('resultText');
  resultTextElement.textContent = `Kamu membutuhkan ${fuelNeeded.toFixed(1)} liter bensin, dengan estimasi biaya Rp ${(fuelNeeded * fuelPrice).toFixed(0)},Pastikan bawa uang lebih!`;
  
  // Show the result popup
  const resultPopup = document.getElementById('result-popup');
  resultPopup.style.display = 'flex';
}

// Add a function to close the result popup
function closeResultPopup() {
  const resultPopup = document.getElementById('result-popup');
  resultPopup.style.display = 'none';
}

        function updateDistance() {
            const sliderValue = document.getElementById('sliderDistance').value;
            document.getElementById('distance').value = sliderValue;
            document.getElementById('sliderValue').textContent = `${sliderValue} km`;
        }

        function switchTheme() {
            const body = document.body;
            body.dataset.theme = body.dataset.theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', body.dataset.theme);
        }

        // Load saved preferences
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const body = document.body;
            body.dataset.theme = savedTheme || 'light';
            
            selectVehicle(currentVehicle);
        });


    </script>

</body>
</html>
