<?php
declare(strict_types = 1);
include "connection.php";

//vars
$month = $_POST['month'];
$amount = $_POST['amount'];
(int)$numOfApt = $_POST['numOfAp'];
$apartment = "apartment";
$aptId = Date('ymdiss');

$insert = 'INSERT into bills values(?,?,?,?)';
$stmt = $connection -> prepare($insert);
$stmt -> bind_params("siis", $month, $amount, $numOfApt, $aptsId);
$stmt -> execute();

for($i = 1; $i <= $numOfApt; $i++){
   
   $apartment.$i = $_POST[$apartment.$i];
   echo $apartment.$i."<br>";
   
   
}

echo "
    Apartments ID: $aptId <br>
    month:$month <br>
    amount:$amount <br>
    number of apartments:$numOfApt
";
?>