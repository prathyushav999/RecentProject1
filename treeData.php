<?php
$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed");

$data = json_decode(file_get_contents("php://input"));

$cus_id = $data->id;
$sql = "SELECT customerid,username from customer where customerid='{$cus_id}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$var = "";
$clientids = array();
$duplicates = array();

while ($row = mysqli_fetch_assoc($result)) {
    $var = $var . '{"img": "https://cdn.balkan.app/shared/5.jpg","id": "' . ltrim($row['customerid'], "SREA-") . '", "name": "' . $row['username'] . '","title": "' . $row['customerid'] . '"},';
}

array_push($duplicates, $cus_id);
$sql = "SELECT customerid AS subordinate_id,
        username AS subordinate_name
        from customer
         where sponserid='{$cus_id}'
        ORDER BY subordinate_id";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

while ($row = mysqli_fetch_assoc($result)) {
    $var = $var . '{"img": "https://cdn.balkan.app/shared/5.jpg","id": "' . ltrim($row['subordinate_id'], "SREA-") . '", "name": "' . $row['subordinate_name'] . '","pid": "' . ltrim($cus_id, "SREA-") . '","title": "' . $row['subordinate_id'] . '"},';
    array_push($clientids, $row['subordinate_id']);
    array_push($duplicates, $row['subordinate_id']);
}
while (count($clientids) > 0) {
    $singleClientId = $clientids[0];
    $sql = "SELECT customerid AS subordinate_id,
        username AS subordinate_name
        from customer
         where sponserid='{$singleClientId}'
        ORDER BY subordinate_id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    while ($row = mysqli_fetch_assoc($result)) {
        $var = $var . '{"img": "https://cdn.balkan.app/shared/5.jpg","id": "' . ltrim($row['subordinate_id'], "SREA-") . '", "name": "' . $row['subordinate_name'] . '","pid": "' . ltrim($singleClientId, "SREA-") . '","title": "' . $row['subordinate_id'] . '"},';
        if (! in_array($row['subordinate_id'], $duplicates)) {
            array_push($clientids, $row['subordinate_id']);
            array_push($duplicates, $row['subordinate_id']);
        }
    }
    array_shift($clientids);
}

mysqli_close($conn);
echo rtrim($var, ", ");
?>