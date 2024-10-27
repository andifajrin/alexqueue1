// Ambil Antrian
function ambilAntrian(code) {
  $.post('ambil_antrian.php', { code: code }, function (data) {
    var opt = {
      margin: 1,
      filename: 'myfile.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
    };

    let mess = '';
    switch (code) {
      case 'A':
        mess = 'Pelayanan Administrasi';
        break;
      case 'B':
        mess = 'Pelayanan Informasi';
        break;
      case 'C':
        mess = 'Pelayanan Pengaduan';
        break;
    }

    html2pdf().set(opt).from(`<div>${code} ${data} </br> ${mess}</div>`).save();
  });
}

// Panggil Antrian
function panggilAntrian() {
  const loket = $('#loket').val();
  const queueCode = $('#antrian').val();

  $.post(
    'panggil_antrian.php',
    { loket: loket, queue_code: queueCode },
    function (data) {
      const response = JSON.parse(data);
      $('#antrianDipanggil').text(
        'Antrian yang dipanggil: ' + response.queue_code + response.queue_number
      );
    }
  );
}

function panggilUlang() {
  const loket = $('#loket').val();
  const queueCode = $('#antrian').val();

  $.post(
    'panggil_ulang.php',
    { loket: loket, queue_code: queueCode },
    function (data) {
      const response = JSON.parse(data);
      $('#antrianDipanggil').text(
        'Antrian yang dipanggil: ' + response.queue_code + response.queue_number
      );
    }
  );
}



// Display Antrian
setInterval(function () {
  $('#displayQueue').load('load_display.php');
}, 5000);

// Fungsi Suara
function playVoice(text) {
  var speech = new SpeechSynthesisUtterance();
  speech.lang = 'id-ID';
  speech.text = 'Nomor antrian ' + text + ', harap menuju loket';
  window.speechSynthesis.speak(speech);
}
