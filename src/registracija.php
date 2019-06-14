<?php

include "connect.php";

$hashedPassword = password_hash($_POST["password"], CRYPT_BLOWFISH);

$stmt = $dbc->prepare("INSERT INTO users(ime, prezime, username, password, razina) VALUES (?, ?, ?, ?, 0)");
$stmt->bind_param("ssss", $_POST["ime"], $_POST["prezime"], $_POST["username"], $hashedPassword);

if($stmt->execute()){
  $_SESSION["username"] = $_POST["username"];
  $_SESSION["razina"] = 0;

  echo "<p>Uspijesna registracija!</p>";
}

$stmt->close();
mysqli_close($dbc);


 ?>
