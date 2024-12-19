<?php 
include "../view/customer_navbar.php";
?>
    <p id="delivery-info-heading">Delivery Information</p>

    <!-- delivery form -->
     <form action="../controller/order_controller.php" method="POST">
        <div class="delivery-container">
            <!-- personal info container -->
            <div class="personal-info">
                <div class="from-field ">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" class="contact-input-field" id="fullname"
                     placeholder="Enter your full name">
                    <span></span>
                </div>

                <div class="from-field ">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" class="contact-input-field" id="phone" 
                    placeholder="977- 98XXXXXXXX">
                    <span></span>
                </div>

                <div class="from-field ">
                    <label for="house">Email:</label>
                    <input type="house" name="house" class="contact-input-field" id="house" 
                    placeholder="Enter your email">
                    <span></span>
                </div>
            </div>

            <!-- address info container -->
            <div class="address-info">
                <div class="from-field ">
                    <label for="region">Region:</label>
                    <input type="text" name="region" class="contact-input-field" id="region" 
                    placeholder="Enter region">
                    <span></span>
                </div>

                <div class="from-field ">
                    <label for="city">City:</label>
                    <input type="text" name="city" class="contact-input-field" id="city" 
                    placeholder="Enter city">
                    <span></span>
                </div>

                <div class="from-field ">
                    <label for="street">Street:</label>
                    <input type="stret" name="street" class="contact-input-field" id="street" 
                    placeholder="Street">
                    <span></span>
                </div>
            </div>

            <!-- total summary container -->
            <div class="total-summary">
                <div class="order-summary">
                    <p id="order-summary">Order Summary</p>
                    <div class="order-row-1">
                        <p>Total items(3)</p>
                        <p>Rs.3000.00</p>
                    </div>
                    <hr id="line">
                    <div class="order-row-1">
                        <p>Total:</p>
                        <p>Rs.3000.00</p>
                    </div>
            <button id="submit" name="submit" class="Order-submit">Process to pay</button>
            </div>
         </div>
     </form>

     <script>
        document.getElementById("submit").addEventListener("click",function(event){
           if(!checkData()){
            event.preventDefault(); 
           }
            
        });

        var fullname = document.getElementById("fullname");
        var phone = document.getElementById("phone");
        var house = document.getElementById("house");
        var region = document.getElementById("region");
        var city = document.getElementById("city");
        var street = document.getElementById("street");
        
        
        function checkData(){
            var fullnameValue = fullname.value.trim();
            var phoneValue = phone.value.trim();
            var houseValue = house.value.trim();
            var regionValue = region.value.trim();
            var cityValue = city.value.trim();
            var streetValue = street.value.trim();
            var isValid=true;


            // for fullname
            if(fullnameValue==""){
                setError(fullname,"Enter fullname");
                isValid=false;
            }else{
                setSuccess(fullname);
            }

            // for phone
            if(phoneValue == ""){
                setError(phone,"Enter phone number");
                isValid=false;
            }else{
                setSuccess(phone);
            }

            // for email
            if (houseValue == "") {
                setError(house, "email required");
                isValid = false;
            } else if (!isEmail(houseValue)) {
                setError(house, "email is not valid");
                isValid = false;
            } else {
                setSuccess(house);
            }

            // for region
            if(regionValue==""){
                setError(region,"Enter region");
                isValid=false;
            }else{
                setSuccess(region)
            }

            // for city
            if(cityValue==""){
                setError(city,"Enter city");
                isValid=false;
            }else{
                setSuccess(city);
            }

            // for street
            if(streetValue==""){
                setError(street,"Enter street");
                isValid=false;
            }else{
                setSuccess(street);
            }

            return isValid;

        }

            function setError(f,msg){
                var parentBox = f.parentElement;
                parentBox.className = "from-field error";
                var span = parentBox.querySelector("span");
                span.innerText = msg;
            }

            function setSuccess(f){
                var parentBox = f.parentElement;
                parentBox.className = "from-field success";
            }

            if(fullnameValue!="" && phoneValue!="" && houseValue!=""&& 
            regionValue!=""&&cityValue !=""&& streetValue!=""){
                window.location.href="payment.html";
            }

            function isEmail(e) {
            var reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return reg.test(e);
            }
    
     </script>
     
</body>

</html>