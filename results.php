<?php

include "db.php";

$result = $conn->query("SELECT * FROM candidates ORDER BY votes DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Voting Results</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
        }

        .container {
            width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>🗳️ Voting Results</h1>

    <table>

        <tr>
            <th>Candidate</th>
            <th>Party</th>
            <th>Votes</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>

            <td>
                <?php echo $row['name']; ?>
            </td>

            <td>
                <?php echo $row['party']; ?>
            </td>

            <td>
                <?php echo $row['votes']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>