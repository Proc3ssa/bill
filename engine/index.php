<?php
declare(strict_types = 1);
include "connection.php";

//vars
$month = $_POST['month'];
$amount = $_POST['amount'];
(int)$numOfApt = $_POST['numOfAp'];
$apartment = "apartment";
$aptsId = Date('ymdiss');

$insert = 'INSERT into bills values(?,?,?,?)';
$stmt = $connection -> prepare($insert);
$stmt -> bind_param("siis", $month, $amount, $numOfApt, $aptsId);

$stmt -> execute();



var_dump($stmt -> errorno);

for($i = 1; $i <= $numOfApt; $i++){
   
  $numOfTnts = $_POST[$apartment.$i];
   $aptname = $apartment.$i;
   
   $insert2 = 'INSERT into apts values(?,?,?)';
   $stmt = $connection -> prepare($insert2);
   $stmt -> bind_param("ssi", $aptsId, $aptname, $numOfTnts);
   $stmt -> execute();

   

   echo $apartment.$i."<br>";
   
   
}

echo "
    Apartments ID: $aptsId <br>
    month:$month <br>
    amount:$amount <br>
    number of apartments:$numOfApt
";
?>