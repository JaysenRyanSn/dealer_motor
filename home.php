<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEALER JAYSEN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            color: #333;
            background-color: #f0f2f5;
        }

        /* Header */
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: red;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .header .logo img {
            width: 70px;
        }

        .header nav {
            display: flex;
            gap: 20px;
        }

        .header nav a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .header nav a:hover {
            color: #4CAF50;
        }

        /* Main Section */
        .main, .second-section, .third-section {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding-top: 80px; /* Offset for the fixed header */
            padding-bottom: 40px;
        }

        .image-section, .content-section {
            flex: 1;
            padding: 40px;
        }

        .image-section img {
            width: 80%;
            max-width: 600px;
            margin-left: 40px;
        }

        .content-section h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .content-section p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .content-buttons {
            display: flex;
            gap: 20px;
        }

        .content-buttons button {
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .content-buttons .btn-primary {
            background-color: #ddd;
            color: #333;
        }

        .content-buttons .btn-primary:hover {
            background-color: #bbb;
        }

        .content-buttons .btn-secondary {
            background-color: #ddd;
            color: #333;
        }

        .content-buttons .btn-secondary:hover {
            background-color: #bbb;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .footer-logo, .footer-contact, .footer-social {
            width: 30%;
            padding: 10px;
        }

        .footer-logo img {
            display: block;
            margin: 0 auto 10px;
        }

        .footer-logo p {
            font-size: 14px;
            color: #ddd;
        }

        .footer-contact h3, .footer-social h3 {
            font-size: 16px;
            color: #ffcc00;
        }

        .footer-contact p, .footer-social a {
            color: #ccc;
            font-size: 14px;
        }

        .footer-social a {
            color: #ffcc00;
            text-decoration: none;
        }

        .footer-social a:hover {
            text-decoration: underline;
        }

        .footer-copyright {
            color: #aaa;
            margin-top: 10px;
            font-size: 12px;
        }

    </style>
</head>
<body>

<!-- Header -->
<header class="header">
    <div class="logo">
        <img src="logodealer.png" alt="Logo">
    </div>
    <nav>
        <a href="#main">Beranda</a>
        <a href="#second-section">Input</a>
        <a href="#third-section">Diagram</a>
        <a href="#footer">Kontak</a>
    </nav>
</header>

<!-- First Section -->
<section class="main" id="main">
    <div class="image-section">
        <img src="1.png" alt="Sample Image">
    </div>
    <div class="content-section">
        <h1>Selamat Datang Di Aman Lalu Lintas</h1>
        <p>Silahkan Melihat Data Kendaraan yang Sudah Aman dari Lalu Lintas</p>
        <div class="content-buttons">
            <form action="datamotor.php">
                <button class="btn-primary" type="submit">Lihat Motor</button>
            </form><br>
        </div>
    </div>
</section>

<!-- Second Section -->
<section class="second-section" id="second-section">
    <div class="content-section">
        <h1>Kamu Sudah Merasa Aman??</h1>
        <p>Ayo daftar kendaraanmu agar Mudah dan Aman Melewati Lalu Lintas</p>
        <div class="content-buttons">
            <form action="motor.php">
                <button class="btn-primary" type="submit">Daftar Motor</button>
            </form><br>
        </div>
    </div>
    <div class="image-section">
        <img src="2.png" alt="Another Sample Image">
    </div>
</section>

<!-- Third Section (Copy of First Section) -->
<section class="third-section" id="third-section">
    <div class="image-section">
        <img src="3.png" alt="Third Sample Image">
    </div>
    <div class="content-section">
        <h1>Lihatlah Diagram dan Data Motor</h1>
        <p>Dapatkan informasi diagram dan data motor yang terbaru disini.</p>
        <div class="content-buttons">
            <form action="diagrammotor.php">
                <button class="btn-primary" type="submit">Lihat Diagram</button>
            </form><br>
        </div>
    </div>
</section>

<footer class="footer" id="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="logodealer.png" alt="Dealer Logo" width="70px">
            <p>Dealer Jaysen - Menyediakan Motor Berkualitas dan Layanan Terbaik untuk Anda</p>
        </div>
        <div class="footer-contact">
            <h3>Kontak Kami</h3>
            <p>Alamat: Jl. Contoh Alamat No. 123, Jakarta</p>
            <p>Telepon: (021) 123-4567</p>
            <p>Email: info@dealerjaysen.com</p>
        </div>
        <div class="footer-social">
            <h3>Ikuti Kami</h3>
            <a href="#" target="_blank">Facebook</a> | 
            <a href="#" target="_blank">Instagram</a> | 
            <a href="#" target="_blank">Twitter</a>
        </div>
    </div>
    <p class="footer-copyright">&copy; 2024 Dealer Jaysen. All rights reserved.</p>
</footer>


</body>
</html>
