<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Display Antrian</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Display Antrian Terkini</h1>
    <div class="display-container">
        <div class="queue-box" id="queueA">
            <h2>Antrian A</h2>
            <p id="numberA">0</p>
        </div>
        <div class="queue-box" id="queueB">
            <h2>Antrian B</h2>
            <p id="numberB">0</p>
        </div>
        <div class="queue-box" id="queueC">
            <h2>Antrian C</h2>
            <p id="numberC">0</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=vamG9vno"></script>
    <script>
        // Menyimpan antrian terakhir yang dipanggil untuk setiap kode
        let lastQueue = {
            A: null,
            B: null,
            C: null
        };


        updateDisplay();

        // Fungsi untuk memperbarui nomor antrian terkini dan memanggil suara
        function updateDisplay() {
            $.get('get_display_data.php', function(data) {
                const {
                    queueA,
                    queueB,
                    queueC,
                    calls
                } = data;

                console.log(calls);

                if (queueA?.queue_number !== lastQueue?.A?.queue_number) {
                    $('#numberA').text(queueA.queue_number || '-');
                    // if (queueA.name && queueA.queue_number) speakQueue('A', queueA);
                    lastQueue.A = queueA;
                }
                if (queueB?.queue_number !== lastQueue?.B?.queue_number) {
                    $('#numberB').text(queueB.queue_number || '-');
                    // if (queueB.name && queueB.queue_number) speakQueue('B', queueB);
                    lastQueue.B = queueB;
                }
                if (queueC?.queue_number !== lastQueue?.C?.queue_number) {
                    $('#numberC').text(queueC.queue_number || '-');
                    // if (queueC.name && queueC.queue_number) speakQueue('C', queueC);
                    lastQueue.C = queueC;
                }

                if (calls && calls?.length > 0) {
                    calls.forEach(call => {
                        if (call.queue_code && call.queue_number)
                            speakQueue(call.queue_code, call);
                    });
                }
            }, 'json');
        }

        function setDisplay(queue_code, queue_number) {
            $.post('set_display.php', {
                queue_code,
                queue_number
            }, function(data) {
                const response = JSON.parse(data);
                console.log(response);
            });
        }

        // Fungsi untuk memanggil nomor antrian dengan suara
        function speakQueue(queueCode, queue) {
            const message = `Antrian Farmasi ${queueCode} nomor ${queue.queue_number}, silakan menuju ${queue.name}`;
            responsiveVoice.speak(message, "Indonesian Female");

            setDisplay(queueCode, queue.queue_number);
        }

        setInterval(updateDisplay, 5000);
    </script>
</body>

</html>