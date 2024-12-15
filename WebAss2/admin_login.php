<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General body styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Navbar should remain at the top */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Container to hold the login form */
        .main-container {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
            padding-top: 60px; /* To avoid overlapping with the navbar */
        }

        /* Login form styling */
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-container form {
            width: 100%;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #495057;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .login-container input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #218838;
        }

        .login-container .footer-text {
            margin-top: 15px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main container for centering the form -->
    <div class="main-container">
        <div class="login-container">
            <h1>Admin Login</h1>
            <form action="admin_dashboard.php" method="post">
                <label for="admin_id">Admin ID:</label>
                <input type="text" id="admin_id" name="admin_id" placeholder="Enter Admin ID" required>
                <label for="admin_password">Password:</label>
                <input type="password" id="admin_password" name="admin_password" placeholder="Enter Password" required>
                <input type="submit" value="Login">
            </form>
            <p class="footer-text">Please enter your credentials to access the admin dashboard.</p>
        </div>
    </div>
</body>

</html>
