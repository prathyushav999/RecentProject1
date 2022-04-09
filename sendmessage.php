<?php
// Account details
$apiKey = urlencode('MzQ0OTY3NTA3MTc1MzIzNTQ4MzI0NzMwMzU2MjMwMzk=');
// Message details
$sender = urlencode("600010");
$message = rawurlencode("Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/
" );
$data = json_decode(file_get_contents("php://input"));

$number=$data->mobileno;
$numbers = array($number);

$username=$data->username;
$numbers = implode(",", $numbers);
$customerid=$data->customerid;
// Prepare data for POST request
$data = array("apikey" => $apiKey, "numbers" => $numbers, "sender" => $sender, "message" => $message);
// Send the POST request with cURL
$ch = curl_init("https://api.textlocal.in/send/");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
// Process your response here

$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");
$sql = "INSERT INTO notification(customerid,customername,mobileno,message) VALUES ('{$customerid}','{$username}','{$number}','{$response}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
echo $response;
?>