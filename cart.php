<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="products.css">
</head>
<body>
<nav>
    <h2><a href="login.html">LOGIN</a></h2>
    <h2> <a href="home.html">HOME</a></h2>
   <h2> <a href="products.php">PRODUCTS</a></h2>
    <H2> <a href="cc.html">CUSTOMER CARE</a></H2>
    <H2> <a href="cart.php">CART</a></H2>

   
    </nav>
 
    <div class="main">
        
        </div>
        <div class="cart-items">
            <h2>Your Cart</h2>
            <?php
            // Check if the cart is not empty
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                echo '<ul>';
                // Loop through each item in the cart and display it
                foreach ($_SESSION['cart'] as $item) {
                    echo '<li>' . $item['name'] . ' - $' . $item['price'] . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
        <!-- Your existing footer content -->
    </div>
</body>
</html>