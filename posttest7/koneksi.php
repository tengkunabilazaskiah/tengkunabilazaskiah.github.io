<?php

$host = 'localhost';
$dbname = 'registrasi';
$user = 'root'; 
$pass = ''; 

// Mengaktifkan error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    
    // Set charset ke UTF-8
    mysqli_set_charset($conn, 'utf8');
    
    // Jika berhasil
    echo "Koneksi berhasil";
} catch (Exception $e) {
    // Menangani error
    echo "Koneksi gagal: " . $e->getMessage();
    exit();
}

?>
