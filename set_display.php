<?php
include 'config.php';

$queue_number = $_POST['queue_number'];
$queue_code = $_POST['queue_code'];

// Pilih antrian sesuai kode yang dipilih
$sql = "SELECT * FROM queue WHERE status = 'called' AND queue_code = ? AND queue_number = ? ORDER BY id ASC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $queue_code, $queue_number);
$stmt->execute();
$result = $stmt->get_result();
$queue = $result->fetch_assoc();

if ($queue) {
    $queue_id = $queue['id'];

    $conn->query("UPDATE calls SET status = 'already_called', called_at = NOW() WHERE queue_id = $queue_id");

    echo json_encode(['queue_code' => $queue_code, 'queue_number' => $queue_number]);
} else {
    echo json_encode(['queue_code' => $queue_code, 'queue_number' => 'Tidak ada antrian']);
}
