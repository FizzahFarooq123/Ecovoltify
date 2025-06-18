<?php
    include "connection.php";
    //deleting products from database
    if (isset($_GET['delete'])) 
    {
        $id = $_GET['delete'];
        $deletequery = "DELETE FROM product WHERE product.product_id = $id ";
        $result = mysqli_query($conn, $deletequery);
        if ($result)
        {
            echo"
            <script>
                alert('One product has been deleted');
                window.location.href='deleteproducts.php';
            </script>
            ";
        }
    }
?>
