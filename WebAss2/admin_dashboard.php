<?php
// Hardcoded admin credentials
$fixed_admin_id = "admin";
$fixed_admin_password = "admin123";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $admin_password = $_POST['admin_password'];

    // Validate admin credentials
    if ($admin_id === $fixed_admin_id && $admin_password === $fixed_admin_password) {
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = ""; // Use your MySQL password
        $dbname = "registration_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the users table
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>User Database</title>
        <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center; }
        h1 { color: #333; }
        table { width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #28a745; color: white; }
        </style>
        </head>
        <body>
        <h1>User Database</h1>";

        if ($result->num_rows > 0) {
            echo "<table>
                  <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Date of Birth</th>
                      <th>Gender</th>
                      <th>Country</th>
                  </tr>";
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
            echo "<p>No users found in the database.</p>";
        }

        echo "</body></html>";
        $conn->close();
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid Admin ID or Password.</p>";
        echo "<a href='admin_login.php' style='display:block;text-align:center;'>Go back to Login</a>";
    }
} else {
    echo "<p style='color:red; text-align:center;'>Unauthorized access!</p>";
}
?>
