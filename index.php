<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Scanner</title>
    <style>
    #video-container {
        position: relative;
        width: 400px;
        /* Ganti sesuai kebutuhan */
        height: 300px;
        /* Ganti sesuai kebutuhan */
    }

    #qr-video {
        width: 100%;
        height: 100%;
    }

    #qr-result {
        margin-top: 10px;
        font-size: 18px;
        /* Ganti sesuai kebutuhan */
    }
    </style>
</head>

<body>
    <div id="video-container">
        <video id="qr-video" width="100%" height="100%" playsinline></video>
    </div>
    <div id="qr-result">Hasil QR Code akan muncul di sini</div>

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
    const video = document.getElementById('qr-video');
    const qrResult = document.getElementById('qr-result');

    const scanner = new Instascan.Scanner({
        video
    });

    scanner.addListener('scan', function(content) {
        qrResult.textContent = 'Hasil QR Code: ' + content;
    });

    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('Tidak ada kamera yang ditemukan.');
        }
    }).catch(function(e) {
        console.error(e);
    });
    </script>
</body>

</html>