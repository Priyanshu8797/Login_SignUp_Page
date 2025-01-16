<?php

// // Database connection
// $servername = "localhost";
// $db_username = "root"; // Your database username
// $db_password = ""; // Your database password
// $dbname = "login"; // Replace with your database name

// $conn = new mysqli($servername, $db_username, $db_password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Handle POST requests for login or registration
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['action'])) {
//         if ($_POST['action'] == 'register') {
//             // Handle registration
//             $username = trim($_POST['username']);
//             $email = trim($_POST['email']);
//             $password = trim($_POST['password']);

//             // Check if user already exists
//             $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("ss", $username, $email);
//             $stmt->execute();
//             $result = $stmt->get_result();

//             if ($result->num_rows > 0) {
//                 echo "<p style='color: red;'>Username or Email already exists. Please log in.</p>";
//             } else {
//                 // Hash the password
//                 $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//                 // Insert new user into the database
//                 $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->bind_param("sss", $username, $email, $hashed_password);

//                 if ($stmt->execute()) {
//                     echo "<p style='color: green;'>Registration successful. You can now log in.</p>";
//                 } else {
//                     echo "<p style='color: red;'>Error: Could not register. Please try again later.</p>";
//                 }
//             }
//             $stmt->close();
//         } elseif ($_POST['action'] == 'login') {
//             // Handle login
//             $username = trim($_POST['username']);
//             $password = trim($_POST['password']);

//             // Check if user exists
//             $sql = "SELECT * FROM users WHERE username = ?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("s", $username);
//             $stmt->execute();
//             $result = $stmt->get_result();

//             if ($result->num_rows > 0) {
//                 $user = $result->fetch_assoc();

//                 // Verify password
//                 if (password_verify($password, $user['password'])) {
//                     echo "<p style='color: green;'>Login successful. Welcome, " . htmlspecialchars($username) . "!</p>";
//                     // Redirect or start a session here if needed
//                     // session_start();
//                     // $_SESSION['username'] = $username;
//                     header("Location: https.//piehost.com");
//                     // exit();
//                 } else {
//                     echo "<p style='color: red;'>Invalid password. Please try again.</p>";
//                 }
//             } else {
//                 echo "<p style='color: red;'>User not found. Please register first.</p>";
//             }
//             $stmt->close();
//         }
//     }
// }
// $conn->close();




$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "login";  

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists
    echo "<p style='color: red;'>User already exists. Please log in instead.</p>";
} else {
    // Insert new user
    if (isset($_POST['submit'])) {
        // Get the form data
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $checkQuery = "SELECT * FROM users WHERE username = '$user' OR email = '$email'";
        $result = $conn->query($checkQuery);
        if ($result->num_rows > 0) {
            // If a record with the same username or email exists
            echo "Error: Username or Email already exists!";
        }
        else {
            // If no duplicate record is found, proceed with inserting the data
            // Hash the password for security
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            
            // SQL query to insert data into the users table
            $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_password')";
            
            // Execute the query
            if ($conn->query($sql) === TRUE) {
                //<script>
                //alert("Passwords match. Form submitted successfully!");
                //</script>
                echo "New record created successfully! SignUp to Continue";
                //header("location:https://piehost.com");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        $conn->close();
    }
} 
?>

