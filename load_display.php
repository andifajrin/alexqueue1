<?php
include 'config.php';

$sql = "SELECT queue_code, COUNT(*) AS total FROM queue WHERE status = 'waiting' GROUP BY queue_code";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<p>Antrian " . $row['queue_code'] . ": " . $row['total'] . "</p>";
}
?>
