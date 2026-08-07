<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Voter Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #667eea;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
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

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h1>🗳️</h1>

    <h2>Voter Login</h2>

    <form action="login.php" method="POST">

        <label>Voter ID</label>

        <input
            type="text"
            name="voter_id"
            placeholder="Enter Voter ID"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

    <a href="index.php" class="back">
        ← Back to Home
    </a>

</div>

</body>

</html>