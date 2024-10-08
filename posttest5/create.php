<?php
include 'registrasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO registrasi (nama_lengkap, email, tanggal_lahir, nomor_telepon, gender) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $email, $tanggal_lahir, $nomor_telepon, $gender);
    
    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    // Redirect ke halaman read.php setelah menyimpan
    header('Location: read.php');
}
?>
