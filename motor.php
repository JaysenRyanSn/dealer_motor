<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $pemilik_motor = $_POST['pemilik_motor'];
    $cc_motor = $_POST['cc_motor'];
    $harga_motor = $_POST['harga_motor'];

    if (!empty($nama_motor) && !empty($pemilik_motor) && !empty($harga_motor)) {
        // Menyimpan data motor ke database
        $stmt = $con->prepare("INSERT INTO MOTOR (nama_motor, pemilik_motor, cc_motor, harga_motor) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $nama_motor, $pemilik_motor, $cc_motor, $harga_motor); 
        
        if ($stmt->execute()) {
            // Panggil Flask server untuk memperbarui diagram
            $command = escapeshellcmd('curl http://127.0.0.1:5000/update_diagram');
            shell_exec($command);

            echo "<script type='text/javascript'> alert('Successfully Registered'); window.location.href = 'motor.php'; </script>";
        } else {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "'); </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please Enter all Required Information'); </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silahkan Daftarkan Motor Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            width: 70%;
            max-width: 750px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .image-section {
            background: url('fotodealer.jpg') no-repeat center center/cover;
            width: 45%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 40px;
            height: auto;
        }
        .form-section {
            width: 55%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .form-section h1 {
            font-size: 22px;
            margin-bottom: -10px;
            color: #333;
        }
        .form-section h4 {
            font-size: 15px;
            margin-bottom: 40px;
            color: #666;
        }
        form {
            width: 100%;
        }
        label {
            font-weight: 500;
            color: #333;
        }
        input[type="text"] {
            font-family: 'Poppins', sans-serif;
            width: 90%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input[type="submit"], button {
            font-family: 'Poppins', sans-serif;
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input[type="submit"] {
            background-color: red;
            align-items : center;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="image-section">
        <a href="home.php">
            <img src="back.png" alt="Dealer Logo" class="logo">
        </a>
    </div>
    <div class="form-section">
        <h1>DAFTARKAN MOTOR ANDA</h1>
        <h4>Silahkan Daftarkan Motor Anda Di Bawah ini!!</h4>
        <form method="POST">
            <label>Nama Pemilik</label>
            <input type="text" placeholder="Nama Anda" name="pemilik_motor" required>
            <label>Nama Motor</label>
            <input type="text" placeholder="Nama-CBS/ABS" name="nama_motor" required>
            <label>CC Motor</label>
            <input type="text" placeholder="CC Motor" name="cc_motor" required>
            <label>Harga Motor</label>
            <input type="text" placeholder="Harga Motor" name="harga_motor" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
