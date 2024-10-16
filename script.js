// Menangani klik tombol registrasi
const modal = document.getElementById('registrationModal');
const btn = document.getElementById('registration-button');
const span = document.getElementsByClassName('close')[0];

btn.onclick = function() {
    modal.style.display = 'block';
}

// Menangani klik tombol tutup
span.onclick = function() {
    modal.style.display = 'none';
}

// Menangani klik di luar modal untuk menutup
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Menangani pengiriman formulir
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Registrasi berhasil!'); // Logika registrasi dapat ditambahkan di sini
    modal.style.display = 'none'; // Tutup modal setelah registrasi
});

