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
            <form action="../controller/customer_controller.php" method="POST">
                <div class="from-field ">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="contact-input-field" id="email" placeholder="Email">
                    <span></span>
                </div>

                <div class="from-field ">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="contact-input-field" id="password" placeholder="Password">
                    <span></span>
                </div>

                <button class="btn-login" id="submit" name="login">Login</button>                
            </form>
            <p>don't have an account? <a href="signUp.php" id="sign-up-txt">Sign Up</a></p>
        </div>
        <div class="image-box">
            <div class="login-image-container">
                <img src="/dokan/images/login.png" alt="">
            </div>
        </div>
    </div>

    <script>
  document.getElementById("submit").addEventListener("click", function (event) {
    if (!checkData()) {
        event.preventDefault(); 
    }
});

    var email = document.getElementById("email");
    var password = document.getElementById("password");

    function checkData() {
        var emailValue = email.value.trim();
        var passwordValue = password.value.trim();
        var isValid = true;

        // for email
        if (emailValue == "") {
            setError(email, "email required");
            isValid = false;
        } else if (!isEmail(emailValue)) {
            setError(email, "email is not valid");
            isValid = false;
        } else {
            setSuccess(email);
        }

        // for password
        if (passwordValue == "") {
            setError(password, "required password");
            isValid = false;
        } else {
            setSuccess(password);
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
        parentBox.className = "from-field success";
    }

    function isEmail(e) {
        var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return reg.test(e);
    }
</script>
    

</body>

</html>