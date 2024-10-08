<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'registrasi_db';
$user = 'root'; 
$pass = ''; 

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $gender = $_POST['gender'];

    // Query untuk insert data ke database
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
}

$conn->close();
?>
