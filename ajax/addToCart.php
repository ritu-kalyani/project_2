<?php
session_start();
require_once "../submodules/_dbconnect.php";

$item = $_GET["id"];
$sql = "SELECT * FROM product WHERE pid='" . $item . "'";
$result = $conn->query($sql);
    
$row = $result->fetch_assoc();
    $arr = array(
        "pid" => $row["pid"],
        "pname" => $row["pname"],
        "price" => $row["price"],
        "quantity" => 1,
        "total" => $row["price"]
    );

if (isset($_SESSION['cart'])) {
    $_SESSION['cart'][$item] = $arr;
}

else {
    $_SESSION['cart'][$item] = $arr;
}