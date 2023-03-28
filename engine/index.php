<?php
declare(strict_types = 1);
include "connection.php";

//vars
$month = $_POST['month'];
$amount = $_POST['amount'];
(int)$numOfApt = $_POST['numOfAp'];
(string)$apartment = $_POST['apartment1'];
for($i = 1; $i <= $numOfApt; $i++){
    
    $apartment.$i = $_POST['apartment1'];
   
}

echo "
    month:$month <br>
    amount:$amount <br>
    number of apartments:$numOfApt
";
?>