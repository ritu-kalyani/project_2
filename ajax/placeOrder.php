<?php
    session_start();

    require_once "../submodules/_dbconnect.php";

    $address = $_GET["address"] . " " . $_GET["zipcode"];
    $phoneNo = $_GET["phoneNo"];
    $total = $_GET["total"];

    $userID = $conn->query("SELECT uid FROM user WHERE uname='" . $_SESSION["uname"] . "'")->fetch_assoc()["uid"];

    $insertOrder = "INSERT INTO orders(uid, total, address, phone) VALUES ('" . $userID . "', '" . $total . "', '" . $address . "', '" . $phoneNo ."')";
    $exec = $conn->query($insertOrder);

    $oid = $conn->insert_id;

    foreach($_SESSION["cart"] as $item) {
        $insertItem = "INSERT INTO order_product(oid, pid, quantity) VALUES('" . $oid . "', '" . $item["pid"]. "', '" . $item["quantity"] . "')";
        $exec = $conn->query($insertItem);
    }
?>