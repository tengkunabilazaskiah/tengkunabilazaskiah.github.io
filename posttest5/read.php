<?php
include 'registrasi.php';

$sql = "SELECT * FROM registrasi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi</title>
</head>
<body>
    <h2>Data Registrasi</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Telepon</th>
            <th>Gender</th>
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
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a> | 
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
