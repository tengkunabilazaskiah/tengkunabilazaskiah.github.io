<?php

$host = 'localhost';
$dbname = 'registrasi_db';
$user = 'root'; 
$pass = ''; 

$conn = mysqli_connect($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

