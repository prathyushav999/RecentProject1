<?php
$conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");

$data = json_decode(file_get_contents("php://input"));

$customerId = $data->customerId;
$givenPvs=$data->pvs;
$amountPerPv=$data->amountPerPv;
$amount="";
$balanceAmount="";
$sql = "SELECT customerid,sponserid,amount,balanceAmount,pvs,balancePvs from customer where customerid='{$customerId}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$sponserid="";
$balancepvs="";
$pvs="";
$var="";
$resarray=array();
$customerName="";
$count=1;
$resString="";
while($customerId!="" && $customerId!="SREA-0")
{
$givenPvs=$data->pvs; 
$sql = "SELECT customerid,username,sponserid,amount,balanceAmount,pvs,balancePvs from customer where customerid='{$customerId}'";
$sponserid="";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
while($row = mysqli_fetch_assoc($result)){
    $var =$row['customerid'];
    $sponserid=$row['sponserid'];
    $pvs=$row['pvs'];
    $balancepvs=$row['balancePvs'];  
    $pvs=$row['pvs'];
    $amount=$row['amount'];
    $balanceAmount=$row['balanceAmount'];
    $customerName=$row['username'];
}
if($var=="")
{
    echo "Customer not found";
    return "Customer Id not present";
}

if($count==1)
{
    $givenPvs=$givenPvs*300;
}
elseif($count==2 || $count==3)
{
    $givenPvs=$givenPvs*75;  
}
elseif($count==4)
{
    $givenPvs=$givenPvs*50;
}
elseif($count==5)
{
    $givenPvs=$givenPvs*40;
}
else 
{
    $givenPvs=$givenPvs*20;
}

$pvsToBeAdded=$pvs+$givenPvs;
$balancePvsToBeAdded=$balancepvs+$givenPvs;
$amountToBeAdded=$amount+($givenPvs*$amountPerPv);
$balanceAmountToBeAdded=$balanceAmount+($givenPvs*$amountPerPv);

if($count<=8)
{
    $resString=$resString.($customerName)." ".($customerId)." ".((9-$count))." ".($givenPvs)." ".($givenPvs*$amountPerPv)."<br>";
    #array_push($resarray,array($customerName,$customerId,9-$count,$pvs,$pvs*$amountPerPv));
}
$count=$count+1;
$customerId=$sponserid;

}



mysqli_close($conn);
echo $resString;
?>