<?php
$customerid = $_GET['customerid'];
$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");
$sql1 = "SELECT * FROM customer WHERE customerid = '{$customerid}'";
$viewresult = mysqli_query($conn, $sql1) or die("View Query Unsuccessful.");
if (mysqli_num_rows($viewresult) > 0) {
    while ($row = mysqli_fetch_assoc($viewresult)) {
        
        $paidAmount=$row['paidAmount']+$row['balanceAmount'];
        $balanceAmount = 0;
        $paidPvs=$row['paidPvs']+$row['balancePvs'];
        $balancePvs = 0;
}

include 'config.php';

$sql = "UPDATE customer SET balanceAmount = '{$balanceAmount}', paidAmount = '{$paidAmount}',paidPvs='{$paidPvs}',balancePvs='$balancePvs' WHERE customerid = '{$customerid}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/SREA/payment.php?customerId=SREA-0");

mysqli_close($conn);
}
?>
