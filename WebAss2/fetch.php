<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

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
    text-align: center;
    color: #333;
}
table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}
th {
    background-color: #28a745;
    color: white;
    font-size: 16px;
}
td {
    font-size: 14px;
}
</style>
</head>
<body>

<h1>User Details</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Country</th>
          </tr>";
    // Fetch rows from the result
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['firstname'] . "</td>
                <td>" . $row['lastname'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['dob'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['country'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center;'>No users found.</p>";
}

$conn->close();
?>

</body>
</html>
