// Inisialisasi total harga
let totalPrice = 0;

// Fungsi untuk menambah tiket
function addTicket(ticketType, price) {
    // Tambahkan harga tiket ke total harga
    totalPrice += price;
    
    // Perbarui tampilan DOM dengan total harga baru
    document.getElementById('totalPrice').textContent = `Total Harga: Rp ${totalPrice.toLocaleString('id-ID')},-`;
    // Debugging dengan console.log untuk memastikan fungsi dipanggil
    console.log('Hamburger menu clicked');
    navbarMenu.classList.toggle('active');
    }


// Fungsi untuk menangani tombol "Lanjut ke Pembayaran"
function proceedToPayment() {
    // Ambil nilai dari setiap input form
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const dob = document.getElementById('dob').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const gender = document.getElementById('gender').value;

    // Periksa apakah semua field form sudah diisi
    if (name === "" || email === "" || dob === "" || phone === "" || gender === "") {
        // Tampilkan peringatan jika ada field yang belum diisi
        alert("Semua kolom harus diisi sebelum melanjutkan pembayaran.");
        return;
    }

    // Periksa apakah tiket sudah dipilih
    if (totalPrice > 0) {
        // Tampilkan alert konfirmasi dengan total harga
        alert(`Total harga tiket Anda adalah Rp ${totalPrice.toLocaleString('id-ID')},-. Terima kasih telah memesan!`);
    } else {
        // Tampilkan error jika belum ada tiket yang ditambahkan
        alert('Silakan pilih tiket sebelum melanjutkan pembayaran.');
    }
}

// Fungsi untuk mengaktifkan atau menonaktifkan menu navigasi
function toggleMenu() {
    const navbarMenu = document.getElementById('navbarMenu');
    menu.classList.toggle("active");
}

document.getElementById("theme-toggle").addEventListener("change", function() {
    // Mengubah body class untuk dark mode
    document.body.classList.toggle("dark-mode");
    // Mengubah navbar class untuk dark mode
    const navbar = document.querySelector(".navbar");
    navbar.classList.toggle("dark-mode");
    // Mengubah footer class untuk dark mode
    const footer = document.querySelector("footer");
    footer.classList.toggle("dark-mode");
});



// Fungsionalitas toggle tema (opsional)
const themeToggle = document.getElementById('theme-toggle');
themeToggle.addEventListener('change', () => {
    document.body.classList.toggle('dark-theme');
});


console.log('script.js sudah ter-load');
