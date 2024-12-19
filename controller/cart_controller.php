<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myItems = array_column($_SESSION['cart'],'product_name');
            if(in_array($_POST['product_name'],$myItems)){
                echo "<script> 
                alert('product already added');
                  window.location.href = document.referrer || 'defaultPage.php';
                </script>";
            }else{
            
                
            $count= count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('product_name'=>$_POST['product_name'],'image'=>$_POST['image'], 'price'=>$_POST['price'],'quantity'=>1);
            echo "<script> 
              window.location.href = document.referrer || 'defaultPage.php';
            </script>";
            }
        }else
        {
            $_SESSION['cart'][0]=array('product_name'=>$_POST['product_name'], 'image'=>$_POST['image'],'price'=>$_POST['price'],'quantity'=>1);
            echo "<script> 
              window.location.href = document.referrer || 'defaultPage.php';
            </script>";
            
        }
        
    }
    if(isset($_POST['remove_product'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['product_name']==$_POST['rmv_product']){ 
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                        window.location.href='../view/cart.php';
                    </script>";
            }
        }
    }
    
    if(isset($_POST['modifiy_quantity'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['product_name']==$_POST['rmv_product']){ 
                $_SESSION['cart'][$key]['quantity']=$_POST['modifiy_quantity'];
                echo "<script>
                        window.location.href='../view/cart.php';
                    </script>";
            }
        }
    }
}
?> 