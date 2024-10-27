<?php
include 'config.php';

$loket = $_POST['loket'];
$queue_code = $_POST['queue_code'];

// Pilih antrian sesuai kode yang dipilih
$sql = "SELECT * FROM queue WHERE status = 'called' AND queue_code = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $queue_code);
$stmt->execute();
$result = $stmt->get_result();
$queue = $result->fetch_assoc();

if ($queue) {
    $queue_id = $queue['id'];
    $queue_number = $queue['queue_number'];

    $sql_calls = "INSERT INTO calls (queue_id, status) VALUES (?, 'called')";
    $stmt_calls = $conn->prepare($sql_calls);
    $stmt_calls->bind_param("i", $queue_id);
    $stmt_calls->execute();


    echo json_encode(['queue_code' => $queue_code, 'queue_number' => $queue_number]);
} else {
    echo json_encode(['queue_code' => $queue_code, 'queue_number' => 'Tidak ada antrian']);
}
