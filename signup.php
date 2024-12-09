<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraVacation - Signup</title>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #1a2b4d; /* Menukar warna background */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Blur background */
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

        /* Popup Container */
        .popup-container {
            position: relative;
            width: 320px; /* Lebar form diatur agar input tidak keluar */
            background-color: #0d1c34; /* Warna container diubah */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px;
            z-index: 1;
            text-align: center;
        }

        /* Icon at the top */
        .form-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
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
            width: calc(100% - 20px); /* Menyesuaikan input agar tidak terlalu panjang */
            padding: 10px;
            border: 1px solid #44577c;
            border-radius: 5px;
            background-color: #1a2b4d; /* Mengubah warna input agar lebih terang */
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

        /* Close button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: #ffffff;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #ff4b5c;
        }

        p {
            margin-top: 15px;
            color: #c1c1c1;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Blur background -->
    <div class="blur-background"></div>

    <!-- Signup Form Popup -->
    <div class="popup-container">
        <span class="close-btn" onclick="window.location.href='index.php'">&times;</span>

        <!-- Icon di tengah atas form -->
        <img src="icon.ico" alt="Icon" class="form-icon">
        
        <h2>Signup</h2>
        <form action="signupprocess.php" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" id="nama_depan" name="nama_depan" required>
            </div>
            <div class="input-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" id="nama_belakang" name="nama_belakang" required>
            </div>
            <button type="submit" class="btn-submit">Signup</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
