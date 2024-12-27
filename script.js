// Smooth scroll functionality
document.querySelectorAll('.header nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Registration button functionality
document.querySelector('button[onclick]').addEventListener('click', function () {
    alert('Redirecting to the registration page.');
});
const html5QrCode = new Html5Qrcode("qr-reader");

const config = { fps: 10, qrbox: { width: 250, height: 250 } };

html5QrCode.start(
    { facingMode: "environment" },
    config,
    decodedText => {
        console.log("Decoded text: ", decodedText);
        document.getElementById("qr-result").innerText = `QR Code Scanned: ${decodedText}`;
    },
    error => {
        console.error("Scan error: ", error);
    }
).catch(err => {
    console.error("QR Scanner failed to start: ", err);
});
navigator.mediaDevices.getUserMedia({ video: true })
    .then(() => {
        console.log("Camera is accessible.");
    })
    .catch(err => {
        console.error("Camera access error: ", err);
        alert("Camera access is required for the QR scanner.");
    });
