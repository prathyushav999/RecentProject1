<?php
$customerid = $_GET['customerid'];
$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");
$sql1 = "SELECT * FROM customer WHERE customerid = '{$customerid}'";
$result = mysqli_query($conn, $sql1) or die("View Query Unsuccessful.");
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["customerid"] . "," . $row["username"] . "," . $row["lastName"] . "," . $row["mobileno"] . "," . $row["email"] . "," . $row["sponserid"] . "," . $row["sponsername"] . "," . $row["aadharNumber"] . "," . $row["address"] . "," .$row["gender"];
    }
}
mysqli_close($conn);
?>
