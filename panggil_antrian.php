<?php
include 'config.php';

$loket = $_POST['loket'];
$queue_code = $_POST['queue_code'];

// Pilih antrian sesuai kode yang dipilih
$sql = "SELECT * FROM queue WHERE status = 'waiting' AND queue_code = ? ORDER BY id ASC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $queue_code);
$stmt->execute();
$result = $stmt->get_result();
$queue = $result->fetch_assoc();

if ($queue) {
    $queue_id = $queue['id'];
    $queue_number = $queue['queue_number'];

    // Update status dan waktu pemanggilan
    $conn->query("UPDATE queue SET status = 'called', called_at = NOW() WHERE id = $queue_id");
    $conn->query("UPDATE counter SET current_queue = $queue_number WHERE id = $loket");

    echo json_encode(['queue_code' => $queue_code, 'queue_number' => $queue_number]);
} else {
    echo json_encode(['queue_code' => $queue_code, 'queue_number' => 'Tidak ada antrian']);
}
?>
