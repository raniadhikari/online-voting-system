<?php

session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $voter_id = $_POST["voter_id"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM voters 
            WHERE voter_id = '$voter_id' 
            AND password = '$password'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Database query failed: " . $conn->error);
    }

    if ($result->num_rows == 1) {

        $voter = $result->fetch_assoc();

        if ($voter["has_voted"] == 1) {

            echo "<h2>You have already voted!</h2>";

        } else {

            $_SESSION["voter_id"] = $voter_id;

            header("Location: vote.php");
            exit();
        }

    } else {

        echo "<h2>Invalid Voter ID or Password</h2>";
    }
}

?>