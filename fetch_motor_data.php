<?php
session_start();
include("db.php");

// Set header agar respons berupa JSON
header('Content-Type: application/json');

// Query untuk mengambil data nama motor dari database
$query = "SELECT nama_motor FROM MOTOR";
$result = mysqli_query($con, $query);

$motor_names = [];

// Ambil semua data nama motor dari hasil query
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $motor_names[] = $row['nama_motor'];
    }
    
    // Cek jika jumlah data nol, untuk mencegah DivisionByZero di script Python
    if (count($motor_names) > 0) {
        // Kirim data sebagai JSON
        echo json_encode($motor_names);
    } else {
        // Jika tidak ada data, kirim array kosong
        echo json_encode([]);
    }
} else {
    // Tampilkan pesan error jika query gagal
    echo json_encode(["error" => "Error fetching data from database"]);
}
?>
