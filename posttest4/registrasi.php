<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST); // Ini akan menunjukkan semua data yang dikirim dari formulir
    echo "</pre>";

    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    // Format data untuk disimpan
    $data = "Nama: $name, Email: $email, Tanggal Lahir: $dob, No Telepon: $phone, Jenis Kelamin: $gender\n";

    // Simpan data ke file txt
    $file = fopen("registrasi_data.txt", "a"); // Buka file dalam mode append
    if ($file) {
        fwrite($file, $data); // Tulis data ke file
        fclose($file); // Tutup file
        echo "Data berhasil disimpan!<br>";
    } else {
        echo "Gagal menyimpan data!<br>";
    }
}

// Tampilkan isi file registrasi_data.txt
if (file_exists("registrasi_data.txt")) {
    echo "<h2>Data Pendaftaran:</h2>";
    echo nl2br(file_get_contents("registrasi_data.txt"));
} else {
    echo "Belum ada data terdaftar.";
}
?>
