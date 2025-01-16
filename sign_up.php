<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <!-- <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <title>Sign Up</title>
    </head>
    <body>
        
        <div class="container">
        <h2>SignUp</h2>
            <form method="POST" action="signup_validation.php" >
                Username: <input type="text" id="username" name="username"required >
                <br><br>
                Email:<input type="email" id="email" name="email" required><br><br>
                Password: <input type="password" id="password" name="password" required>
                <br>
                <br>
                <button type="submit" name="submit"  style="font-size:25px;">Sign Up</button>
            </form>
        </div>
    </body>
</html>


