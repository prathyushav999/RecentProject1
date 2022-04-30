<?php
$customerid = $_GET['customerid'];
$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");
$sql1 = "SELECT * FROM customer WHERE customerid = '{$customerid}'";
$result = mysqli_query($conn, $sql1) or die("View Query Unsuccessful.");
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()) {
        echo  $row["pvs"]. "," . $row["amount"]."," . $row["paidPvs"]. ",".$row["paidAmount"].",".$row["balancePvs"].",".$row["balanceAmount"];
    }
}
mysqli_close($conn);
?>
