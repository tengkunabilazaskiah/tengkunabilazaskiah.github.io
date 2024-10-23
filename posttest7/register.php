<?php
// Koneksi ke database
include 'koneksi.php'; // Pastikan ini menghubungkan ke database kamu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = strtolower(trim($_POST['email'])); // Simpan dalam lowercase
    $password = $_POST['password'];

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Debug: Lihat data yang akan disimpan
    var_dump($nama_lengkap, $email, $hashedPassword); // Menampilkan data sebelum simpan

    // Query untuk menyimpan data registrasi ke dalam database
    $sql = "INSERT INTO users (nama_lengkap, email, password) VALUES ('$nama_lengkap', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "Registrasi sukses!";
        header("Location: login.php"); // Redirect ke halaman login setelah registrasi
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
