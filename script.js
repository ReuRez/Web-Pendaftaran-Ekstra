// Menangani klik tombol registrasi
const modal = document.getElementById('registrationModal');
const btn = document.getElementById('registration-button');
const span = document.getElementsByClassName('close')[0];

// Show the modal when the button is clicked
btn.onclick = function() {
    modal.style.display = 'block';
}

// Close the modal when the close button is clicked
span.onclick = function() {
    modal.style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

