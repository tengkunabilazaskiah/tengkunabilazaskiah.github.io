<?php
require 'koneksi.php';

$sql = "SELECT * FROM registrasi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #ff6347;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ff6347;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .actions a {
            text-decoration: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            margin: 0 5px;
        }
        .actions .edit {
            background-color: #4CAF50;
        }
        .actions .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Registrasi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Nomor Telepon</th>
                <th>Gender</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama_lengkap']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['tanggal_lahir']}</td>
                            <td>{$row['nomor_telepon']}</td>
                            <td>{$row['gender']}</td>
                            <td><img src='img/{$row['bukti_pembayaran']}' width='100px'></td>
                            <td class='actions'>
                                <a href='update.php?id={$row['id']}' class='edit'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
