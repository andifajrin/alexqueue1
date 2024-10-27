<?php
include 'config.php';

function getLastQueue($conn, $code)
{
    $sql = "SELECT queue.queue_number, counter.name FROM queue LEFT JOIN counter ON queue.counter_id = counter.id WHERE queue.queue_code = ? AND queue.status = 'called' ORDER BY queue.called_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $queue = $result->fetch_assoc();

    return $queue ? $queue : null;
}

function getCalls($conn)
{
    $sql = "SELECT queue.queue_number,queue.queue_code, counter.name FROM calls LEFT JOIN queue ON calls.queue_id = queue.id LEFT JOIN counter ON queue.counter_id = counter.id WHERE calls.status = 'called' ORDER BY calls.called_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $queue = $result->fetch_all(MYSQLI_ASSOC);


    return $queue ? $queue : null;
}

$response = [
    'queueA' => getLastQueue($conn, 'A'),
    'queueB' => getLastQueue($conn, 'B'),
    'queueC' => getLastQueue($conn, 'C'),
    'calls' => getCalls($conn)
];


echo json_encode($response);
