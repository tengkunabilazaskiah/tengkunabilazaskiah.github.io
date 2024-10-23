<?php
// Koneksi ke database
include 'koneksi.php'; // Pastikan ini menghubungkan ke database kamu
session_start(); // Mulai session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil input dan melakukan validasi
    $email = strtolower(trim($_POST['email'])); // Pastikan email disimpan dalam lowercase
    $password = $_POST['password'];

    // Validasi input
    if (empty($email) || empty($password)) {
        die("Email dan password harus diisi!");
    }

    // Debug: Lihat email yang diproses (Hapus atau komentar ini di lingkungan produksi)
    var_dump($email); // Tambahkan ini untuk debugging

    // Query untuk mendapatkan data pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Password benar, simpan session
            $_SESSION['loggedin'] = true; // Tandai pengguna sebagai login
            $_SESSION['email'] = $email; // Simpan email pengguna

            // Redirect ke halaman utama atau halaman lain setelah login sukses
            header("Location: index.html");
            exit(); 
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Pengguna tidak ditemukan!";
    }

    // Tutup koneksi
    $stmt->close();
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>
