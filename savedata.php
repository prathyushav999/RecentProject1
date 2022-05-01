<?php
$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");

$sql = "SELECT id FROM sequence WHERE name = 'SREA'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$data = json_decode(file_get_contents("php://input"));

$cus_email = $data->email;
$cus_username = $data->username;
$cus_sponserid = $data->sponserid;
$cus_sponsername = $data->sponsername;
$cus_mobileno = $data->mobileno;
$cus_password = $data->password;
$var = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $var = $row['id'] + 1;
}
$cus_id = "SREA-" . (string) $var;

$sql = "INSERT INTO customer(email,username,sponserid,sponsername,mobileno,password,customerid) VALUES ('{$cus_email}','{$cus_username}','{$cus_sponserid}','{$cus_sponsername}','{$cus_mobileno}','{$cus_password}','{$cus_id}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$sql = "UPDATE sequence SET id={$var} WHERE name ='SREA'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

mysqli_close($conn);
echo $cus_id;

?>
