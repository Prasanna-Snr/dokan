<?php 
include "../view/customer_navbar.php";
?>


    <!-- hero -->
    <div class="hero-container">
        <div class="hero-content">
            <p id="big-text">
                Lorem, ipsum dolor sit amet consectetur adipisicing.
            </p>

            <p id="small-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. saepe nemo voluptate, corrupti, ratione nobis
                quo dignissimos ipsam facilis culpa, ea dolorem. Doloribus ex nisi accusantium non neque repellat in
                nostrum nihil perspiciatis itaque, a tempore! Nihil, voluptate. Lorem ipsum dolor sit amet consectetur
                adipisicing elit.
            </p>

            <a href="">
                <div class="btn-container">
                    <div class="btn">
                        <span>Explore more</span>
                    </div>
                </div>
            </a>

        </div>
        <div class="hero-image">
            <img src="/dokan/images/img2.png" alt="">
        </div>
    </div>

    <!-- new arrivals -->
    <div class="new-arrivals-container">
        <p id="big-text">New Arrivals</p>
        <div class="item-container">
            <div class="small-item">
                <div class="small-item-container">
                    <div class="items">
                        <form action="../controller/cart_controller.php" method="POST">
                        <a href="product_detail.php" class="img-container">
                            <div class="new">NEW</div>
                            <img src="/dokan/images/img15.png" alt="">
                        </a>
                        <p id="title">Lorem ipsum dolor sit amet.</p>
                        <div class="price-container">
                            <p id="price">Rs.100.00</p>
                            <button  type = "submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        </div>
                        <input type="hidden" name="product_name" value="drone-1">
                        <input type="hidden" name="price" value="100">
                        <input type="hidden" name="image" value="../images/img15.png">
                        </form>
                    </div>

                    <div class="items">
                        <form action="../controller/cart_controller.php" method="POST">
                        <a href="product_detail.php" class="img-container">
                            <div class="new">NEW</div>
                            <img src="/dokan/images/img8.png" alt="">
                        </a>
                        <p id="title">Lorem ipsum dolor sit amet.</p>
                        <div class="price-container">
                            <p id="price">Rs.100.00</p>
                            <button  type = "submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        </div>
                        <input type="hidden" name="product_name" value="drone-2">
                        <input type="hidden" name="price" value="200">
                        <input type="hidden" name="image" value="../images/img15.png">
                        </form>
                    </div>
                </div>

                <div class="small-item-container">
                    <div class="items">
                        <form action="../controller/cart_controller.php" method="POST">
                        <a href="product_detail.php" class="img-container">
                            <div class="new">NEW</div>
                            <img src="/dokan/images/img2.png" alt="">
                        </a>
                        <p id="title">Lorem ipsum dolor sit amet.</p>
                        <div class="price-container">
                            <p id="price">Rs.100.00</p>
                            <button  type = "submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        </div>
                        <input type="hidden" name="product_name" value="drone-3">
                        <input type="hidden" name="price" value="100">
                        <input type="hidden" name="image" value="../images/img15.png">
                        </form>
                    </div>

                    <div class="items">
                        <form action="../controller/cart_controller.php" method="POST">
                        <a href="product_detail.php" class="img-container">
                            <div class="new">NEW</div>
                            <img src="/dokan/images/img9.png" alt="">
                        </a>
                        <p id="title">Lorem ipsum dolor sit amet.</p>
                        <div class="price-container">
                            <p id="price">Rs.100.00</p>
                            <button  type = "submit" class="add-to-cart" name="add_to_cart">Add to cart</button>
                        </div>
                        <input type="hidden" name="product_name" value="drone-4">
                        <input type="hidden" name="price" value="200">
                        <input type="hidden" name="image" value="../images/img15.png">
                        </form>
                    </div>
                </div>
            </div>

            <div class="big-item">
                <img src="/dokan/images/img7.png" alt="">
                <a href="product_detail.html" class="bit-imgage-floating">Explore More</a>
            </div>
        </div>
    </div>

    <hr class="custom-line">

    <!-- offer  -->
    <div class="offer-container">
        <p id="big-text">Special offer</p>
        <div class="item-container">

            <div class="items">
                <a href="product_detail.html" class="img-container">
                    <div class="sale">30% off</div>
                    <img src="/dokan/images/img7.png" alt="">
                </a>
                <p id="title">Lorem ipsum dolor sit amet.</p>
                <div class="price-container">
                    <p id="price">Rs.100.00</p>
                    <a href="#" class="add-to-cart">Add to cart</a>
                </div>
            </div>

            <div class="items">
                <a href="product_detail.html" class="img-container">
                    <div class="sale">30% off</div>
                    <img src="../images/img14.png" alt="">
                </a>
                <p id="title">Lorem ipsum dolor sit amet.</p>
                <div class="price-container">
                    <p id="price">Rs.100.00</p>
                    <a href="#" class="add-to-cart">Add to cart</a>
                </div>
            </div>

            <div class="items">
                <a href="product_detail.html" class="img-container">
                    <div class="sale">30% off</div>
                    <img src="/dokan/images/img4.png" alt="">
                </a>
                <p id="title">Lorem ipsum dolor sit amet.</p>
                <div class="price-container">
                    <p id="price">Rs.100.00</p>
                    <a href="#" class="add-to-cart">Add to cart</a>
                </div>
            </div>

            <div class="items">
                <a href="product_detail.html" class="img-container">
                    <div class="sale">30% off</div>
                    <img src="/dokan/images/img5.png" alt="">
                </a>
                <p id="title">Lorem ipsum dolor sit amet.</p>
                <div class="price-container">
                    <p id="price">Rs.100.00</p>
                    <a href="#" class="add-to-cart">Add to cart</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
    include "../view/customer_footer.php";
    ?>

</body>

</html>