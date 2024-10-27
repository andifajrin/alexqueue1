<?php
include 'config.php';

$code = $_POST['code'];
$sql = "SELECT IFNULL(MAX(queue_number), 0) + 1 AS new_number FROM queue WHERE queue_code = '$code'";
$result = $conn->query($sql);
$new_number = $result->fetch_assoc()['new_number'];

$sql_insert = "INSERT INTO queue (queue_code, queue_number) VALUES ('$code', $new_number)";
$conn->query($sql_insert);

// get id
$sql_id = "SELECT id FROM queue WHERE queue_code = '$code' AND queue_number = $new_number";
$result_id = $conn->query($sql_id);
$id = $result_id->fetch_assoc()['id'];

$sql_calls = "INSERT INTO calls (queue_id) VALUES ($id)";
$conn->query($sql_calls);

echo $new_number;
