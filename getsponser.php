<?php
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT username FROM customer WHERE customerId = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($sname);
$stmt->fetch();
$stmt->close();

echo $sname;
?>