<?php
include 'config.php';

$code = $_POST['code'];
$sql = "SELECT IFNULL(MAX(queue_number), 0) + 1 AS new_number FROM queue WHERE queue_code = '$code'";
$result = $conn->query($sql);
$new_number = $result->fetch_assoc()['new_number'];

$sql_insert = "INSERT INTO queue (queue_code, queue_number) VALUES ('$code', $new_number)";
$conn->query($sql_insert);

echo $new_number;
?>
