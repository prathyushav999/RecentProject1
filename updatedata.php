<?php
$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");

$data = json_decode(file_get_contents("php://input"));


$cus_customerid = $data->customerid;
$cus_first = $data->first;
$cus_last = $data->last;
$cus_mobileno = $data->mobile;
$cus_email = $data->email;
$cus_address = $data->address;
$cus_aadhar = $data->aadhar;
$cus_gender = $data->gender;

$sql = "UPDATE customer SET email='{$cus_email}',mobileno='{$cus_mobileno}',username='{$cus_first}',lastName='{$cus_last}',aadharNumber='{$cus_aadhar}',address='{$cus_address}',gender='{$cus_gender}' WHERE customerid='{$cus_customerid}'";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


mysqli_close($conn);
echo $result;

?>
