<?php
    include('connection.php');
    session_start();
    // session_destroy();
    // $_SESSION['cart']=array();
    $product_id= $_POST['product_id'];
    $product_name= $_POST['product_name'];
    $product_pic=$_POST['product_pic'];
    $price=$_POST['price2'];
    $quantity = $_POST['quantity'];
    if(isset($_POST['addtocart']))
    {
        if(isset($_SESSION['email']))
        {
            

            $check_product=array_column($_SESSION['cart'],'product_name');
            if(in_array($product_name, $check_product))
            {
                
                echo"
                <div style='display: flex; justify-content:center;'>
                    <div style='width: 60%;' class='alert alert-danger' role='alert'>
                        <div style='display: flex; justify-content: center; align-items: center;'>
                            <svg style='width:50px; height:50px' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            Product already added in cart. To buy more of this product, please update your cart.
                             <a href='cart2.php' class='alert-link'>Click here</a> to go to your cart.
                        </div>
                    </div>
                </div>
                ";
                
            }
            else
            {
                $_SESSION['cart'][]= array('product_id' => $product_id, 'product_name' => $product_name, 
                                            'product_pic' => $product_pic,'price' => $price, 
                                            'quantity' => $quantity);
                // print_r($_SESSION['cart']);
                header("location: cart2.php");
            }
            
        }
        else{
            echo"
            <div style='display: flex; justify-content:center;'>
                <div style='width: 60%;' class='alert alert-danger' role='alert'>
                    <div style='display: flex; justify-content: center; align-items: center;'>
                        <svg style='width:50px; height:50px' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        You must login first <a href='user-login.php' class='alert-link'>Click here</a> to login.
                    </div>
                </div>
            </div>
            ";
        }
        
       


        // echo $product_id . "-----";
        // echo $quantity . "-----";
        // echo $price;
    }

    //deleting products from cart
    if(isset($_POST['remove']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['product_name'] === $_POST['item'])
            {
                unset($_SESSION['cart'][$key]);
                //rearrange array index
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location: cart2.php');
            }
        }
    }

    //updating products in cart
    if(isset($_POST['update']))
    {
        echo "hshshhs";
        print_r($_SESSION['cart']);

        foreach($_SESSION['cart'] as $key => $value)
        {
            // print_r($_SESSION['cart']);
            if($value['product_name'] === $_POST['item'])
            {
                $_SESSION['cart'][$key]= array('product_id' => $product_id,'product_name' => $product_name, 
                                                'product_pic' => $product_pic,'price' => $price, 
                                                'quantity' => $quantity);
                // print_r($_SESSION['cart']);
                header("location: cart2.php");
            }
        }
    }
?>