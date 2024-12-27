<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        #qr-reader {
            margin: 20px auto;
            width: 300px;
            height: 300px;
        }
        #qr-result {
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }
    </style>
</head>
<body>
    <h1>QR Code Scanner</h1>
    <div id="qr-reader"></div>
    <div id="qr-result">Scanned QR Code will appear here.</div>

    <script>
        // Check if the camera is accessible
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(() => {
                console.log("Camera is accessible.");
            })
            .catch(err => {
                console.error("Camera access error: ", err);
                alert("Camera access is required for the QR scanner.");
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
            alert("QR Scanner initialization failed. Check console logs.");
        });
    </script>
</body>
</html>
