<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p id="login-txt">login</p>
    <div class="login-container">
        <div class="login-box">
            <form action="../controller/login_controller.php" method="POST">
                <div class="from-field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="contact-input-field" id="email" placeholder="Email">
                </div>
    
                <div class="from-field">
                    <label for="psw">Password:</label>
                    <input type="password" name="password" class="contact-input-field" id="password" placeholder="Password">
                </div>

                <button id="btn-login" name="submit">Login</button>
            </form>
            <p>don't have an account? <a href="signup.php" id="sign-up-txt">Sign Up</a></p>
        </div>
        <div class="image-box">
            <div class="login-image-container">
                <img src="/dokan/images/login.png" alt="login logo">
            </div>
        </div>
    </div>
</body>
</html>