<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            font-size: 28px;
            color: #e60000;
            margin-top: 20px;
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #e60000;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background-color: #e60000;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

    <h3>Data Motor</h3>
    <table>
        <tr>
            <th>Kode Motor</th>
            <th>Nama Pemilik</th>
            <th>Nama Motor</th>
            <th>CC Motor</th>
            <th>Harga Motor</th>
        </tr>
        <?php
            include "db.php";
            $query = mysqli_query($con, "SELECT * FROM DEALER.MOTOR");
            while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $data['kode_motor']; ?></td>
            <td><?php echo $data['pemilik_motor']; ?></td>
            <td><?php echo $data['nama_motor']; ?></td>
            <td><?php echo $data['cc_motor']; ?></td>
            <td><?php echo $data['harga_motor']; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>

    <form action="home.php">
        <button type="submit">Kembali Ke Menu Awal</button>
    </form>

</body>
</html>
