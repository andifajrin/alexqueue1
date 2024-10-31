<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Loket Pemanggil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Loket Pemanggil Antrian</h1>
    <form id="loketForm">
        <label for="loket">Pilih Loket:</label>
        <select id="loket" name="loket">
            <?php
            // Query untuk mengambil data loket
            $sql = "SELECT id, name FROM counter";
            $result = $conn->query($sql);

            // Tampilkan setiap loket sebagai opsi dropdown
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            } else {
                echo "<option value=''>Tidak ada loket</option>";
            }
            ?>
        </select>

        <label for="antrian">Pilih Antrian:</label>
        <!-- Tombol untuk memilih antrian -->
        <div id="antrianButtons">
            <button type="button" onclick="panggilAntrian('A')">Antrian A</button>
            <button type="button" onclick="panggilAntrian('B')">Antrian B</button>
            <button type="button" onclick="panggilAntrian('C')">Antrian C</button>
        </div>

        <button type="button" onclick="panggilUlang()">Panggil Ulang</button>
    </form>
    <p id="antrianDipanggil">Antrian yang dipanggil: <span id="queueNumber"></span></p>

    <script>
        // Fungsi untuk memanggil antrian berdasarkan kategori yang dipilih
        function panggilAntrian(antrian) {
            var loket = $("#loket").val();
            if (loket) {
                $("#queueNumber").text("Loket " + loket + " memanggil Antrian " + antrian);
                // Tambahkan logika atau AJAX di sini jika perlu
            } else {
                alert("Silakan pilih loket terlebih dahulu.");
            }
        }

        // Fungsi untuk memanggil ulang antrian yang sama
        function panggilUlang() {
            var currentQueue = $("#queueNumber").text();
            if (currentQueue) {
                alert("Mengulang panggilan: " + currentQueue);
                // Tambahkan logika atau AJAX di sini jika perlu
            } else {
                alert("Belum ada antrian yang dipanggil.");
            }
        }
    </script>
</body>

</html>
