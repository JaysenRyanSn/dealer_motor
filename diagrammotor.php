<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$dbname = "DEALER";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data cc_motor dari tabel MOTOR
$sql = "SELECT cc_motor FROM MOTOR";
$result = $conn->query($sql);

$motor_cc_data = [];

if ($result->num_rows > 0) {
    // Mengambil setiap baris dan menambahkan cc_motor ke dalam array
    while ($row = $result->fetch_assoc()) {
        $motor_cc_data[] = $row['cc_motor'];
    }
} else {
    echo "0 results";
}

$conn->close();

// Fungsi untuk menghitung mean
function calculate_mean($data) {
    if (count($data) === 0) {
        return 0; // Menghindari pembagian dengan 0
    }
    return array_sum($data) / count($data);
}

// Fungsi untuk menghitung median
function calculate_median($data) {
    if (count($data) === 0) {
        return 0; // Menghindari perhitungan median jika data kosong
    }
    sort($data);
    $count = count($data);
    $middle = floor($count / 2);

    if ($count % 2) {
        return $data[$middle];
    } else {
        return ($data[$middle - 1] + $data[$middle]) / 2;
    }
}

// Fungsi untuk menghitung modus
// Fungsi untuk menghitung modus
function calculate_mode($data) {
    if (count($data) === 0) {
        return 0; // Menghindari perhitungan modus jika data kosong
    }
    
    // Hitung frekuensi setiap nilai
    $values = array_count_values($data);
    
    // Urutkan berdasarkan frekuensi tertinggi
    arsort($values);
    
    // Ambil nilai dengan frekuensi tertinggi
    $highest_frequency = reset($values);
    
    // Ambil semua nilai dengan frekuensi tertinggi
    $modes = array_keys($values, $highest_frequency);
    
    // Jika ada lebih dari dua modus, tidak ada modus
    if (count($modes) > 2) {
        return "Tidak ada modus";
    }
    
    // Jika ada dua modus, kembalikan keduanya
    if (count($modes) == 2) {
        return implode(' dan ', $modes);
    }
    
    // Jika hanya ada satu modus, kembalikan modus tersebut
    return $modes[0] . " CC";
}


// Statistik
$mean = calculate_mean($motor_cc_data);
$median = calculate_median($motor_cc_data);
$mode = calculate_mode($motor_cc_data);

// Menghitung jumlah motor berdasarkan CC
$motor_counts = array_count_values($motor_cc_data);

// Tampilkan hasilnya di halaman HTML (di bawah ini adalah contoh HTML)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik CC Motor</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }
        .stats-container, .diagram {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 40%; /* Membuat kolom 2 elemen berdampingan */
        }
        .diagram {
            text-align: center;
        }
        .diagram img {
            max-width: 100%;
            border-radius: 8px;
        }
        .stats-box {
            margin-bottom: 20px;
        }
        .stats-box h3 {
            color: #ff5722;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .stats-box p, .stats-box ul {
            font-size: 1rem;
            line-height: 1.5;
        }
        ul {
            list-style: none;
            padding-left: 20px;
        }
        ul li {
            margin: 5px 0;
        }


        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                align-items: center;
            }
            .stats-container, .diagram {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Statistik CC Motor</h1>

    <div class="content">
        <!-- Diagram Motor -->
        <div class="diagram">
        <h2>Diagram Motor</h2>
            <img src="static/diagram_motor.png?<?= time() ?>" alt="Diagram Motor">
        </div>

        <!-- Statistik CC Motor -->
        <div class="stats-container">
            <h2>Statistik CC Motor</h2>

            <div class="stats-box">
                <h3>Mean | Median | Modus</h3>
                <p><strong>Rata-rata (Mean):</strong> <?= $mean ?> CC</p>
                <p><strong>Median:</strong> <?= $median ?> CC</p>
                <p><strong>Modus:</strong> <?= $mode ?></p>
            </div>

        <div class="stats-box">
            <h3>Jumlah Motor Berdasarkan CC:</h3>
            <ul>
                <?php
                // Urutkan array berdasarkan kunci (CC) dari terkecil ke terbesar
                ksort($motor_counts);

                // Tampilkan hasil yang sudah diurutkan
                foreach ($motor_counts as $cc => $count): ?>
                    <li><strong><?= $cc ?> CC</strong>: <?= $count ?> motor</li>
                <?php endforeach; ?>
            </ul>
        </div>
        </div>
    </div>
</div>

</body>
</html>
