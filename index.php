<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class="container">
        <h2  >SignUp</h2>
            <form  method="POST" action="config.php" class="login" >
                Username: <input type="text" name="username" value="" >
                <br>
                <br>
                Email: <input type="email" name="email" value="">
                <br>
                <br>
                Password: <input type="password" name="password" id="password" value="" >
                <br>
                <br>
                Confirm Password:<input type="password" id="confirmPassword"  value="" onkeyup="validatePasswords(event)">
                
                <span id="error-message" class="error" style="color: red"></span><br>

                <br>
                <button type="Submit" name="submit" class="btn" style="font-size:25px;">Register</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button"  class="btn2" style="font-size:25px; " onclick="redirectToSignup(event)">Signup</button>
            </form>
        </div>
        
        <script>
        function redirectToSignup() {
            // event.preventDefault(); 
            window.location.href = "sign_up.php"; 
        }
        function validatePasswords(event) {
            // event.preventDefault(); // Prevent form submission
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            const errorMessage = document.getElementById("error-message");

            if (password === confirmPassword) {
                errorMessage.textContent = ""; // Clear error message
                // alert("Passwords match. Form submitted successfully!");
                // You can submit the form here if needed
                // document.getElementById("form").submit();
            } else {
                errorMessage.textContent = "Passwords do not match! Please try again.";
            }
        }
    </script>
    </body>
</html>


