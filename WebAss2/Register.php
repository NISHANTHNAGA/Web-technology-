<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'registration_db');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // Insert data into the database
    $sql = "INSERT INTO users (firstname, lastname, email, password, dob, gender, country)
            VALUES ('$firstname', '$lastname', '$email', '$password', '$dob', '$gender', '$country')";

    if ($conn->query($sql) === TRUE) {
        // Store user data in session
        $_SESSION['user_data'] = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender,
            'country' => $country
        ];

        // Redirect to user details page
        header("Location: user_details.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h1>Register</h1>
        <form action="Register.php" method="post">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <select name="country" id="country" required>
                    <option value="">Select Country</option>
                    <?php
                    // Load countries dynamically from a JSON file
                    $countries = json_decode(file_get_contents('countries.json'), true);
                    foreach ($countries as $country) {
                        echo "<option value='$country'>$country</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>
