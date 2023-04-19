<?php
include 'connection.php';

$SELECT = "SELECT *FROM bills where mont = 'february'";
$Query = mysqli_query($connection, $SELECT);
$fetch = mysqli_fetch_assoc($Query);

$sumSelect = "SELECT sum(numOfTents) as tenants from apts where id =".$fetch['aptsId']."";
$Query1 = mysqli_query($connection, $sumSelect);
$fetch1 = mysqli_fetch_assoc($Query1);

// echo $sumSelect;

$perPerson = round($fetch['amount']/$fetch1['tenants']);


?>