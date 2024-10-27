<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Display Antrian</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=vamG9vno"></script>
</head>
<body>
    <h1>Display Antrian Terkini</h1>
    <div class="display-container">
        <div class="queue-box" id="queueA">
            <h2>Antrian A</h2>
            <p id="numberA"><?= $queueA ?></p>
        </div>
        <div class="queue-box" id="queueB">
            <h2>Antrian B</h2>
            <p id="numberB"><?= $queueB ?></p>
        </div>
        <div class="queue-box" id="queueC">
            <h2>Antrian C</h2>
            <p id="numberC"><?= $queueC ?></p>
        </div>
    </div>

    <script>
    // Menyimpan antrian terakhir yang dipanggil untuk setiap kode
    let lastQueue = { A: null, B: null, C: null };

    // Fungsi untuk memperbarui nomor antrian terkini dan memanggil suara
    function updateDisplay() {
        $.get('get_display_data.php', function(data) {
            if (data.queueA !== lastQueue.A) {
                $('#numberA').text(data.queueA || '-');
                if (data.queueA) speakQueue('A', data.queueA);
                lastQueue.A = data.queueA;
            }
            if (data.queueB !== lastQueue.B) {
                $('#numberB').text(data.queueB || '-');
                if (data.queueB) speakQueue('B', data.queueB);
                lastQueue.B = data.queueB;
            }
            if (data.queueC !== lastQueue.C) {
                $('#numberC').text(data.queueC || '-');
                if (data.queueC) speakQueue('C', data.queueC);
                lastQueue.C = data.queueC;
            }
        }, 'json');
    }

    // Fungsi untuk memanggil nomor antrian dengan suara
    function speakQueue(queueCode, queueNumber) {
        const message = `Antrian ${queueCode} nomor ${queueNumber}, silakan menuju loket`;
        responsiveVoice.speak(message, "Indonesian Female");
    }

    // Perbarui setiap 5 detik
    setInterval(updateDisplay, 5000);
    </script>
</body>
</html>
