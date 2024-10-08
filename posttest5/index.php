// Proses form ketika di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['dob']) || empty($_POST['phone']) || empty($_POST['gender'])) {
        echo "Semua field harus diisi!";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $dob = htmlspecialchars($_POST['dob']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);
        $submitted = true; // Menandakan bahwa form telah disubmit
    }
}
