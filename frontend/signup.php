<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p id="login-txt">Sign Up</p>
    <div class="login-container">
        <div class="login-box">
            <form action="">
                <div class="from-field">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" id="fullname" class="contact-input-field" placeholder="Fullname">
                </div>
    
                <div class="from-field">
                    <label for="uname">Username:</label>
                    <input type="text" name="uname" class="contact-input-field" id="uname" placeholder="Username">
                </div>

                <div class="from-field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="contact-input-field" placeholder="Email">
                </div>

                <div class="from-field">
                    <label for="psw">Password:</label>
                    <input type="password" name="psw" id="psw" class="contact-input-field" placeholder="Password">
                </div>

                <div class="from-field">
                    <label for="cpsw">Confirm:</label>
                    <input type="password" name="cpsw" id="cpsw" class="contact-input-field" placeholder="Confirm">
                </div>

                <button id="btn-login" name="submit">Login</button>
            </form>
            <p>Already have an account? <a href="" id="sign-up-txt">Login</a></p>
        </div>
        <div class="image-box">
            <div class="login-image-container">
                <img src="images/login.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>