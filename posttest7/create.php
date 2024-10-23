<?php
require 'koneksi.php';

if (isset($_POST["daftar"])) {
    
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

    if(in_array($extensi, $support)) {
        if($size < $max_size) {
            if(move_uploaded_file($tmp_file, $dir.$name_baru)){
                $sql = "INSERT INTO registrasi (nama_lengkap, email, tanggal_lahir, nomor_telepon, gender, bukti_pembayaran) 
                VALUES ('$nama', '$email', '$tanggal_lahir', '$nomor_telepon', '$gender', '$name_baru')"; 
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Data berhasil disimpan'); 
                    window.location.href='index.html';
                    </script>";
                } else {
                    echo "<script>alert('Gagal menyimpan data: " . $conn->error . "'); 
                    window.location.href='index.html';
                    </script>";
                }

            }
        }else {
            echo "<script>alert('File di atas 1mb'); 
            window.location.href='index.html';
            </script>";
        }
    }else {
        echo "<script>alert('Format file tidak didukung');
         window.location.href='index.html';
         </script>";
    }
}
?>
