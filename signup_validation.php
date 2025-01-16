<?php
// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "login";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifying the Credential
        if (password_verify($password, $user['password'])) {
            // echo "<p style='color: green;'>Login successful! Redirecting...</p>";
            header("Location: https://piehost.com");
            exit();
        } else {
            echo "<p style='color: red;'>Invalid Credentials. Try again.</p>";
        }
    } else {
        echo "<p style='color: red;'>User not found. Please register first.</p>";
    }

    $stmt->close();
}
$conn->close();
?>
