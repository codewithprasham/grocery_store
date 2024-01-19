<?php
session_start();

// Function to get products from XML
function getProducts() {
    $xml = simplexml_load_file('products.xml');
    return $xml;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        // Call the addToCart function with product details
        addToCart($_POST['product_name'], $_POST['product_price']);
    }
}

// Function to add a product to the cart
function addToCart($productName, $price) {
    // Initialize the cart if it doesn't exist in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the selected product to the cart
    $_SESSION['cart'][] = array('name' => $productName, 'price' => $price);

    // Provide some feedback to the user (you can customize this part)
    echo "<script>alert('Product added to cart!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Products</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="products.css">
</head>
<body>
    <div class="main">
    <nav>
            <h2><a href="login.html">LOGIN</a></h2>
            <h2> <a href="home.html">HOME</a></h2>
           <h2> <a href="products.php">PRODUCTS</a></h2>
            <H2> <a href="cc.html">CUSTOMER CARE</a></H2>
            <H2> <a href="cart.php">CART</a></H2>
        <h1><i class="fa-solid fa-cart-shopping"></i>NatureMart</h1>
            </nav>

        <div class="product-gallery">
            <?php $products = getProducts(); ?>
            <div class="products">
                <?php foreach ($products->product as $product): ?>
                    <?php
// Assuming $product is an object with properties: name, price, and image_url
?>

<!-- Inside your product card in products.php -->
<div class="card">
    <form method="post">
        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product->name); ?>">
        <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product->price); ?>">
        <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product->image_url); ?>">

        <div class="img"><img src="<?php echo htmlspecialchars($product->image_url); ?>" height="150px"></div>

        <div class="text">
            <p><?php echo htmlspecialchars($product->name); ?> | $<?php echo htmlspecialchars($product->price); ?></p>
        </div>

        <div class="button">
            <button class="addcart" type="submit" name="add_to_cart">
                <i class="fa-solid fa-cart-shopping"></i>Add to Cart
            </button>
        </div>
    </form>
</div>

                <?php endforeach; ?>

            </div>
            <!-- Add more product galleries as needed -->
        </div>
        
    </div>
</body>
</html>