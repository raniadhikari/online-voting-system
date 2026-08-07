<?php

session_start();
include "db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

$result = $conn->query("SELECT * FROM candidates ORDER BY votes DESC");
$total_candidates = $conn->query(
    "SELECT COUNT(*) AS total FROM candidates"
)->fetch_assoc()["total"];

$total_votes = $conn->query(
    "SELECT SUM(votes) AS total FROM candidates"
)->fetch_assoc()["total"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
        }

        .header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #667eea;
            color: white;
        }

        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.add-btn:hover {
    background: #218838;
}
.stats {
    display: flex;
    gap: 20px;
    margin: 20px 0;
}

.stat-box {
    flex: 1;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    text-align: center;
}

.stat-box h3 {
    margin: 0;
    color: #333;
}

.stat-box p {
    font-size: 30px;
    font-weight: bold;
    margin: 10px 0 0;
    color: #667eea;
}
    </style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="header">

    <h1>👨‍💼 Admin Dashboard</h1>

</div>

<div class="container">

    <h2>Voting Results</h2>
    <div class="stats">

    <div class="stat-box">
        <h3>👥 Total Candidates</h3>
        <p><?php echo $total_candidates; ?></p>
    </div>

    <div class="stat-box">
        <h3>🗳️ Total Votes</h3>
        <p><?php echo $total_votes ?? 0; ?></p>
    </div>

</div>
    <a href="add_candidate.php" class="add-btn">
    ➕ Add Candidate
</a>
    <table>

        <tr>
            <th>Candidate</th>
            <th>Party</th>
            <th>Votes</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>

            <td>
                <?php echo $row["name"]; ?>
            </td>

            <td>
                <?php echo $row["party"]; ?>
            </td>

            <td>
                <?php echo $row["votes"]; ?>
            </td>
             <td>
    <a href="delete_candidate.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Are you sure you want to delete this candidate?');">
        Delete
    </a>
</td>
        </tr>

        <?php } ?>

    </table>
    <h2>📊 Vote Distribution</h2>

<div style="width: 100%; max-width: 650px; margin: 30px auto;">
    <canvas id="voteChart"></canvas>
</div>
<script>
    const candidateNames = [
        <?php
        $chart_result = $conn->query(
            "SELECT name FROM candidates ORDER BY votes DESC"
        );

        while ($candidate = $chart_result->fetch_assoc()) {
            echo "'" . addslashes($candidate["name"]) . "',";
        }
        ?>
    ];

    const voteCounts = [
        <?php
        $chart_votes = $conn->query(
            "SELECT votes FROM candidates ORDER BY votes DESC"
        );

        while ($candidate = $chart_votes->fetch_assoc()) {
            echo $candidate["votes"] . ",";
        }
        ?>
    ];

    new Chart(document.getElementById("voteChart"), {

        type: "bar",

        data: {
            labels: candidateNames,

            datasets: [{
                label: "Votes",
                data: voteCounts
            }]
        },

        options: {
            responsive: true,

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }

    });
</script>
    <a href="logout.php" class="logout">
        Logout
    </a>

</div>

</body>

</html>