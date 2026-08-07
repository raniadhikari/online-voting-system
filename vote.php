<?php

session_start();
include "db.php";

if (!isset($_SESSION["voter_id"])) {
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM candidates");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cast Your Vote</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #666;
        }

        .candidate {
            border: 2px solid #ddd;
            padding: 18px;
            margin: 15px 0;
            border-radius: 10px;
            transition: 0.3s;
            background: white;
        }

        .candidate:hover {
            border-color: #667eea;
            background: #f5f6ff;
        }

        .candidate label {
            display: block;
            cursor: pointer;
            font-size: 17px;
        }

        .candidate input {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .candidate strong {
            color: #333;
        }
        .candidate.selected {
    border-color: #667eea;
    background: #eef0ff;
    transform: scale(1.02);
}

        .party {
            margin-left: 28px;
            margin-top: 8px;
            color: #666;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5568d8;
        }

        .logout-btn {
            display: block;
            width: fit-content;
            margin: 0 auto 20px;
            padding: 8px 18px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background: #b02a37;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>🗳️ Cast Your Vote</h1>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

    <p class="subtitle">
        Select one candidate:
    </p>

    <form action="submit_vote.php" method="POST">

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="candidate">

                <label>

                    <input
                        type="radio"
                        name="candidate_id"
                        value="<?php echo $row['id']; ?>"
                        required
                    >

                    <strong>
                        <?php echo htmlspecialchars($row['name']); ?>
                    </strong>

                    <div class="party">
                        Party:
                        <?php echo htmlspecialchars($row['party']); ?>
                    </div>

                </label>

            </div>

        <?php } ?>

        <button type="submit">
            🗳️ Submit Vote
        </button>

    </form>

</div>
<script>
    const voteForm = document.querySelector("form");

    voteForm.addEventListener("submit", function(event) {

        const selected = document.querySelector(
            "input[name='candidate_id']:checked"
        );

        if (!selected) {
            event.preventDefault();
            alert("Please select a candidate.");
            return;
        }

        const confirmation = confirm(
            "Are you sure you want to submit your vote?"
        );

        if (!confirmation) {
            event.preventDefault();
        }

    });


    const candidates = document.querySelectorAll(".candidate");

    candidates.forEach(function(card) {

        const radio = card.querySelector("input[type='radio']");

        radio.addEventListener("change", function() {

            candidates.forEach(function(item) {
                item.classList.remove("selected");
            });

            card.classList.add("selected");

        });

    });

</script>
</body>

</html>