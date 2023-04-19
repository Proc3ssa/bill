<?php
include 'connection.php';

$SELECT = "SELECT *FROM bills where mont = 'january'";
$Query = mysqli_query($connection, $SELECT);
$fetch = mysqli_fetch_assoc($Query);

$sumSelect = "SELECT sum('numOfTents') from apts where id =".$fetch['aptsId']."";
$Query1 = mysqli_query($connection, $sumSelect);
$fetch1 = mysqli_fetch_assoc($Query1);

$perPerson = $fetch['amount']/$fetch1['numOfTents'];


?>