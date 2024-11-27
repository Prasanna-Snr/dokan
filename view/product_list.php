<?php include "admin_navbar.php";?>
<!-- items list container -->
<div class="body-container">
        <div class="categories-section">
            <div class="admin-list">
            <a href="admin_dashboard.php">
            <p id="admin-heading">Dashboard</p>
            </a>
                <hr class="custom-line">
                <ul>
                    <li><a href="#">Customer</a></li>
                    <li><a href="#">Product</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Order</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="#">Profile</a></li>

                </ul>
            </div>
        </div>

        <div class="image-section">
            <a href="add_new_product.php" class="new-product">
                <div class="new-prodcut-contaier">
                    Add new product
                </div>
            </a>
<!-- table of product -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <!-- body -->
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Phone</td>
                        <td style="text-align: center;">
                            <div class="tbl-img-container">
                                <img src="/dokan/images/img3.png" alt="">
                            </div>
                        </td>
                        <td>
                            <a href="" id="product-edit">Edit</a>
                            <a href="" id="product-delete">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Phone</td>
                        <td id="tbl-img">
                            <div class="tbl-img-container">
                                <img src="/dokan/images/img5.png" alt="">
                            </div>
                        </td>
                        <td>
                            <a href="" id="product-edit">Edit</a>
                            <a href="" id="product-delete">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        
    </div>
    </div>
</body>

</html>