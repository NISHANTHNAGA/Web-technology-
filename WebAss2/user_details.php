<?php
session_start(); // Start the session

// Check if user data is available in the session
if (!isset($_SESSION['user_data'])) {
    echo "No user data available.";
    exit();
}

// Retrieve user data from the session
$user = $_SESSION['user_data'];
?>
<?php include 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            margin: 0 auto;
            padding: 20px;
            width: 50%;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Registration Successful!</h1>
    <h2>Your Entered Details:</h2>
    <table>
        <tr>
            <th>First Name</th>
            <td><?php echo htmlspecialchars($user['firstname']); ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?php echo htmlspecialchars($user['lastname']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?php echo htmlspecialchars($user['dob']); ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo htmlspecialchars($user['gender']); ?></td>
        </tr>

        <tr>
            <th>Country</th>
            <td><?php echo htmlspecialchars($user['country']); ?></td>
        </tr>
    </table>
</body>
</html>
