<?php
require 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM registrasi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $gender = $_POST['gender'];

    
    $file_pembayaran = $_FILES['file_pembayaran']['name'];
    $dir = "img/";
    $tmp_file = $_FILES['file_pembayaran']['tmp_name'];
    $extensi = explode('.', $file_pembayaran);
    $extensi = strtolower(end($extensi));
    date_default_timezone_set('Asia/Makassar');
    $name_baru = date('Y-m-d H.i.s').'.'.$extensi;

    $support = ['jpg', 'jpeg', 'png'];
    $size = $_FILES['file_pembayaran']['size'];
    $max_size = 1 * 1024 * 1024; 


    if (!empty($file_pembayaran)) {
        if (in_array($extensi, $support)) {
            if ($size < $max_size) {
          
                if (file_exists($dir . $data['bukti_pembayaran'])) {
                    unlink($dir . $data['bukti_pembayaran']); 
                }
                if (move_uploaded_file($tmp_file, $dir . $name_baru)) {
                 
                    $sql_update = "UPDATE registrasi SET nama_lengkap = ?, email = ?, tanggal_lahir = ?, nomor_telepon = ?, gender = ?, bukti_pembayaran = ? WHERE id = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("ssssssi", $nama, $email, $tanggal_lahir, $nomor_telepon, $gender, $name_baru, $id);
                }
            } else {
                echo "<script>alert('File melebihi ukuran maksimal 1MB');</script>";
            }
        } else {
            echo "<script>alert('Format file tidak didukung');</script>";
        }
    } else {
      
        $sql_update = "UPDATE registrasi SET nama_lengkap = ?, email = ?, tanggal_lahir = ?, nomor_telepon = ?, gender = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssi", $nama, $email, $tanggal_lahir, $nomor_telepon, $gender, $id);
    }

    if ($stmt_update->execute()) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'read.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . $stmt_update->error;
    }

    $stmt_update->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Registrasi</title>
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffb6f9;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff3e0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            text-align: center;
            font-size: 24px;
            background-color: #ffe0b2;
            color: #ff6347;
            padding: 10px;
            border-radius: 5px;
        }

        .form-container input, .form-container select {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container button {
            width: 80%;
            padding: 10px;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto;
        }

        .form-container button:hover {
            background-color: #e05238;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
            background-color: #ffebcd;
            color: #ff4500;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        small {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #ff6347;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h3>Edit Data Registrasi</h3>
        <!-- Form Update Sama dengan Index -->
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $data['nama_lengkap'] ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?= $data['email'] ?>" required>
            <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $data['tanggal_lahir'] ?>" required>
            <input type="tel" name="nomor_telepon" placeholder="Nomor Telepon" value="<?= $data['nomor_telepon'] ?>" required>
            <select name="gender" required>
                <option value="Laki-laki" <?= ($data['gender'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= ($data['gender'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <input type="file" name="file_pembayaran">
            <small>File saat ini: <?= $data['bukti_pembayaran'] ?></small>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
