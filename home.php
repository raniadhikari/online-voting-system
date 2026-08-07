<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Voting System</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-box {
            width: 450px;
            background: white;
            padding: 45px 35px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            margin: 15px 0;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: bold;
            transition: 0.3s;
        }

        .voter-btn {
            background: #667eea;
        }

        .voter-btn:hover {
            background: #5568d8;
            transform: translateY(-2px);
        }

        .admin-btn {
            background: #333;
        }

        .admin-btn:hover {
            background: #222;
            transform: translateY(-2px);
        }

        .footer {
            margin-top: 25px;
            color: #888;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="home-box">

    <div class="icon">
        🗳️
    </div>

    <h1>
        Online Voting System
    </h1>

    <p class="subtitle">
        Secure • Simple • Easy Voting
    </p>

    <a href="login.php" class="btn voter-btn">
        👤 Voter Login
    </a>

    <a href="admin_login.php" class="btn admin-btn">
        👨‍💼 Admin Login
    </a>

    <div class="footer">
        Online Voting System © 2026
    </div>

</div>

</body>

</html>