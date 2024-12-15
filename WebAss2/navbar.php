<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css"> <!-- Include CSS for styling -->
    <style>
        /* Navbar styling */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(90deg, #28a745, #218838);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            margin: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* Responsive navbar for smaller screens */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                padding: 15px 0;
            }

            nav ul li {
                margin: 5px 0;
            }

            nav ul li a {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="admin_login.php">Admin Login</a></li>
        </ul>
    </nav>
</body>

</html>
