<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil data untuk mendapatkan nama file pembayaran
$sql = "SELECT bukti_pembayaran FROM registrasi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data) {
    $file_path = "img/" . $data['bukti_pembayaran'];
    if (file_exists($file_path)) {
        unlink($file_path);  
    }
}


$sql_delete = "DELETE FROM registrasi WHERE id = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $id);

if ($stmt_delete->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='read.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.href='read.php';</script>";
}

$stmt->close();
$stmt_delete->close();
$conn->close();
?>
