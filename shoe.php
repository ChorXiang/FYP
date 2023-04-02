<?php

$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="shoes";
$conn=mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);


if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}