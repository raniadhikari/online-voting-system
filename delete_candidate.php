<?php

session_start();
include "db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM candidates WHERE id = $id";

    if ($conn->query($sql) === TRUE) {

        header("Location: admin_dashboard.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }
}

?>