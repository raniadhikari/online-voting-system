<?php

session_start();
include "db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $party = $_POST["party"];

    $sql = "INSERT INTO candidates (name, party, votes)
            VALUES ('$name', '$party', 0)";

    if ($conn->query($sql) === TRUE) {

        $message = "Candidate added successfully!";

    } else {

        $message = "Error: " . $conn->error;

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Candidate</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .box {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .success {
            color: green;
            text-align: center;
            margin-top: 15px;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="box">

    <h1>➕ Add Candidate</h1>

    <form method="POST">

        <label>Candidate Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter candidate name"
            required
        >

        <label>Party Name</label>

        <input
            type="text"
            name="party"
            placeholder="Enter party name"
            required
        >

        <button type="submit">
            Add Candidate
        </button>

    </form>

    <?php if ($message != "") { ?>

        <p class="success">
            <?php echo $message; ?>
        </p>

    <?php } ?>

    <a href="admin_dashboard.php" class="back">
        ← Back to Dashboard
    </a>

</div>

</body>

</html>