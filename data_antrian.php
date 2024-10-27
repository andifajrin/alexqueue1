<?php
include 'config.php';

function timeDifference($start_time) {
    $now = new DateTime();
    $start = new DateTime($start_time);
    $interval = $now->diff($start);
    return $interval->format('%H:%I:%S');
}

$sql = "SELECT queue_code, queue_number, created_at, called_at FROM queue ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Antrian</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Data Antrian</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Antrian</th>
                <th>Nomor Antrian</th>
                <th>Waktu Dibuat</th>
                <th>Waktu Dipanggil</th>
                <th>Lama Waktu Dipanggil</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['queue_code'] ?></td>
                    <td><?= $row['queue_number'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['called_at'] ?? '-' ?></td>
                    <td>
                        <?php 
                        if ($row['called_at']) {
                            echo timeDifference($row['called_at']);
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>