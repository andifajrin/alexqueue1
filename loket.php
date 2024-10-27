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
        <select id="antrian" name="antrian">
            <option value="A">Antrian A</option>
            <option value="B">Antrian B</option>
            <option value="C">Antrian C</option>
        </select>
        
        <button type="button" onclick="panggilAntrian()">Panggil Antrian</button>
    </form>
    <p id="antrianDipanggil">Antrian yang dipanggil: <span id="queueNumber"></span></p>

    <script src="js/main.js"></script>
</body>
</html>
