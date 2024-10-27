// Ambil Antrian
function ambilAntrian(code) {
    $.post('ambil_antrian.php', { code: code }, function (data) {
        alert("Nomor Antrian Anda: " + data);
    });
}

// Panggil Antrian
function panggilAntrian() {
    const loket = $('#loket').val();
    const queueCode = $('#antrian').val();

    $.post('panggil_antrian.php', { loket: loket, queue_code: queueCode }, function (data) {
        const response = JSON.parse(data);
        $('#antrianDipanggil').text("Antrian yang dipanggil: " + response.queue_code + response.queue_number);
    });
}


// Display Antrian
setInterval(function () {
    $('#displayQueue').load('load_display.php');
}, 5000);

// Fungsi Suara
function playVoice(text) {
    var speech = new SpeechSynthesisUtterance();
    speech.lang = "id-ID";
    speech.text = "Nomor antrian " + text + ", harap menuju loket";
    window.speechSynthesis.speak(speech);
}
