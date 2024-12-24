<?php include "customer_navbar.php"; ?>
    </div>
    <!-- contact body -->
    <div class="contact-container">
        <p id="first-product">Contact</p>

        <div class="msg-info-section">
            <form action="../controller/mail_controller.php" method="POST">
            <div class="msg-section">
                <p id="second-heading">Send us message</p>
                <div class="left-side">
                    <input type="text" name="name" class="contact-input-field" placeholder="Your name">
                    <input type="text" name="email" class="contact-input-field" placeholder="Email">
                    <textarea name="message" id="textarea" cols="45" rows="10" placeholder="your message"></textarea>
                </div>

                <button id="send-btn">Send</button>
            </div>
            </form>


            <div class="info-section">
                <p id="second-heading">Contact information</p>
                <div class="icon-content-2">
                    <i class="fa-solid fa-phone"></i>
                    <p>+977-9808009549</p>
                </div>

                <div class="icon-content-2">
                    <i class="fa-solid fa-envelope"></i>
                    <p>dokan03@gmail.com</p>
                </div>

                <div class="icon-content-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Old Baneshwor, Kathmandu, Nepal</p>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include "customer_footer.php";?>
</body>

</html>