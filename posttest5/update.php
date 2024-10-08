<?php
include 'registrasi.php';

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

    $sql_update = "UPDATE registrasi SET nama_lengkap = ?, email = ?, tanggal_lahir = ?, nomor_telepon = ?, gender = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssi", $nama, $email, $tanggal_lahir, $nomor_telepon, $gender, $id);

    if ($stmt_update->execute()) {
        echo "Data berhasil diupdate!";
        header('Location: read.php');
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
</head>
<body>
    <h2>Edit Data</h2>
    <form action="" method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required><br>

        <label>Nomor Telepon:</label>
        <input type="tel" name="nomor_telepon" value="<?= $data['nomor_telepon'] ?>" required><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="Laki-laki" <?= ($data['gender'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($data['gender'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
        </select><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
