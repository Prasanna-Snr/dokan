<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <p id="login-txt">Admin Sign Up Page</p>
    <div class="login-container">
        <div class="login-box">
            <form action="../controller/admin_controller.php" method="POST">	
                <div class="from-field">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" id="fullname" class="contact-input-field" placeholder="Fullname">
                    <span></span>
                </div>

                <div class="from-field">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="contact-input-field" id="username" placeholder="Username">
                    <span></span>
                </div>

                <div class="from-field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="contact-input-field" placeholder="Email">
                    <span></span>
                </div>

                <div class="from-field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="contact-input-field" placeholder="Password">
                    <span></span>
                </div>

                <div class="from-field">
                    <label for="cpsw">Confirm:</label>
                    <input type="password" name="cpsw" id="cpsw" class="contact-input-field" placeholder="Confirm">
                    <span></span>
                </div>

                <button class="btn-login" id="submit" name="signup">Sign up</button>
            </form>
            <p>Already have an account? <a href="login_admin.php" id="sign-up-txt">Login</a></p>
        </div>
        <div class="image-box">
            <div class="login-image-container">
                <img src="/dokan/images/login.png" alt="">
            </div>
        </div>
    </div>


    <script>
        document.getElementById("submit").addEventListener("click", function (event) {
            if(!checkData()){
                event.preventDefault();
            }
        });
        var fullname = document.getElementById("fullname");
        var uname = document.getElementById("username");
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("cpsw");


        // validation data

        function checkData() {
            var fullnameValue = fullname.value.trim();
            var usernameValue = uname.value.trim();
            var emailValue = email.value.trim();
            var passwordValue = password.value.trim();
            var confirmPasswordValue = confirmPassword.value.trim();
            var isValid = true;

            // for fullname
            if (fullnameValue == "") {
                setError(fullname, "name required")
                isValid=false;
            } else {
                setSuccess(fullname);
            }

            // for username
            if (usernameValue == "") {
                setError(username, "username required");
                isValid=false;
            } else {
                setSuccess(username);
            }

            // for email
            if (emailValue == "") {
                setError(email, "email required");
                isValid=false;
            } else if (!isEmail(emailValue)) {
                setError(email, "email is not valide")
                isValid=false;
            } else {
                setSuccess(email);
            }

            // for password
            if (passwordValue == "") {
                setError(password, "required password");
                isValid=false;
            } else {
                setSuccess(password);
            }


            // for confirm password
            if (confirmPasswordValue == "") {
                setError(cpsw, "confirm password");
                isValid=false;
            } else if (passwordValue != confirmPasswordValue) {
                setError(cpsw, "not match")
                isValid=false;
            }
            else {
                setSuccess(cpsw);
            }
            return isValid; 
        }

        function setError(e, msg) {
            var parentBox = e.parentElement;
            parentBox.className = "from-field error";
            var span = parentBox.querySelector("span");
            span.innerText = msg;
        }

        function setSuccess(e) {
            var parentBox = e.parentElement;
            parentBox.className = "from-field success"
        }

        function isEmail(e) {
            var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return reg.test(e);
        }
    </script>
</body>

</html>