<?php
include 'config.php';

function getLastQueue($conn, $code) {
    $sql = "SELECT queue_number FROM queue WHERE queue_code = ? AND status = 'called' ORDER BY called_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $queue = $result->fetch_assoc();
    return $queue ? $queue['queue_number'] : null;
}

$response = [
    'queueA' => getLastQueue($conn, 'A'),
    'queueB' => getLastQueue($conn, 'B'),
    'queueC' => getLastQueue($conn, 'C')
];

echo json_encode($response);
?>
