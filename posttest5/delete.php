<?php
include 'registrasi.php';

$id = $_GET['id'];
$sql = "DELETE FROM registrasi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Data berhasil dihapus!";
} else {
    echo "Gagal menghapus data: " . $stmt->error;
}

$stmt->close();
$conn->close();

header('Location: read.php');
?>
