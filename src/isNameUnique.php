<?php
include "../connect.php";

$userName = $_POST["userName"];

$stmt = $dbc->prepare('SELECT * FROM users WHERE username = ?');
$stmt->bind_param("s", $userName);

$stmt->execute();
$stmt->store_result();

echo (($stmt->num_rows()) > 0);

$stmt->close();
mysqli_close($dbc);

 ?>
