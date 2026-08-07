<?php

session_start();

include "db.php";

if (!isset($_SESSION["voter_id"])) {
    header("Location: index.php");
    exit();
}

$voter_id = $_SESSION["voter_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $candidate_id = $_POST["candidate_id"];
    

    // Voter ko check karo
    $check = $conn->query(
        "SELECT * FROM voters WHERE voter_id = '$voter_id'"
    );

    if ($check->num_rows != 1) {
        die("Invalid voter.");
    }

    $voter = $check->fetch_assoc();

    // Check karo ki voter pehle vote de chuka hai ya nahi
    if ($voter["has_voted"] == 1) {
        die("You have already voted!");
    }

    // Candidate ke votes mein 1 add karo
    $sql = "UPDATE candidates
            SET votes = votes + 1
            WHERE id = $candidate_id";

    if ($conn->query($sql) === TRUE) {

        // Voter ko voted mark karo
        $conn->query(
            "UPDATE voters
             SET has_voted = 1
             WHERE voter_id = '$voter_id'"
        );

        echo "<h2>✅ Vote submitted successfully!</h2>";
        echo "<p>You cannot vote again.</p>";

    } else {

        echo "Error: " . $conn->error;

    }
}

?>