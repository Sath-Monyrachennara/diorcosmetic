<?php
    session_start();
    require_once('database.php');

    global $userId, $userName;
    if(isset($_SESSION['user_Id'])) {
        $userId = $_SESSION['user_Id'];
        $userName = $_SESSION['userName'];
    }
    $comid = db()->query("SELECT * FROM `users` WHERE `id` = '$userId'");
    $row = mysqli_num_rows($comid);
    if($row >0 ) {
        $userId = $_SESSION['user_Id'];
    }else {
        $userId = 0;
    }  
    
    global $name, $email, $address, $number, $payment_method, $country, $grandTotal, $result, $num_row;
    $grandTotal = 0;
    $orderproducts = "";

    if(isset($_POST['order_btn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'] . " " . $country = $_POST['country'];
        $number = $_POST['number'];
        $payment_method = $_POST['payment'];
    }

    $result = db()->query("SELECT * FROM cart");
    $num_row = mysqli_num_rows($result);

    for($i=1; $i<=$num_row; $i++){
        if($row = mysqli_fetch_array($result)){
            $productsName = $row['pro_name'];
            $subTotal = $row['sub_total'];
        }
           
        $grandTotal = $grandTotal + $subTotal;
        $orderproducts = $orderproducts . $productsName . ', ';
    }

    $compare = db()->query("SELECT * FROM `orders` WHERE `user_id` = '$userId' AND (`payment_method` = '$payment_method' AND `price` = '$grandTotal')");
    $num_rows = mysqli_num_rows($compare);

    if($num_rows > 0 || empty($grandTotal) || empty($name)){
        
    }else {
        $insertData = db()->query("INSERT INTO `orders`(`user_id`, `name`, `email`, `number`, `address`, `payment_method`, `order_product`, `price`) 
        VALUES('$userId', '$name', '$email', '$number', '$address', '$payment_method', '$orderproducts', $grandTotal)");
    }
    $deletedCart = db()->query("DELETE FROM `cart` WHERE `user_id` = $userId");    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section class="checkOut">
        <div class="showProdcuts">
            <?php
                global $productsName, $price, $qty;
                $result = db()->query("SELECT * FROM cart");
                $num_row = mysqli_num_rows($result);

                for($i=1; $i<=$num_row; $i++){
                    if($row = mysqli_fetch_array($result)){
                        $productsName = $row['pro_name'];
                        $price = $row['pro_price'];
                        $qty = $row['quantity'];
                    }
            ?>

                    <p> <?php echo $productsName ?> <span>($<?php echo $price ?>.00/-<?php echo $qty ?> )</span></p>
            <?php
                }
            ?>
        </div>

        <div class="grandTotal">
            <p class="total">Grand Total: <span class="subTotal">$<?php echo $grandTotal ?>.00/-<?php echo $num_row ?> </span> </p>
        </div>
            
        <div class="placeOrder">
            <h2>place your order</h2>
            <form action="checkout.php" method="post" autocomplete="off">
                <div class="col-1">
                    <div class="info">
                        <label for="name">Name: </label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                        <input type="text" id="orderproName" name="orderproName" style="display:none" value="<?php echo $orderproName ?>">
                    </div>
                    <div class="info">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="info">
                        <label for="address">Address: </label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                </div>

                <div class="col-2">
                    <div class="info">
                        <label for="number">Number: </label>
                        <input type="number" id="number" name="number" placeholder="Enter your number" required>
                    </div>
                    <div class="info">
                        <label for="payment">Payment method: </label>
                        <select name="payment" id="payment" name="payment">
                            <option value="cash">Cash on delivery</option>
                            <option value="creditCard">Credit card</option>
                            <option value="paypal">Paypal</option>
                            <option value="aba">ABA</option>
                        </select>
                    </div>
                    <div class="info">
                        <label for="country">Country: </label>
                        <input type="text" id="country" name="country" placeholder="Enter your country" required>
                    </div>
                </div>
                <button type="submit" class="order_btn" name="order_btn">Order Now </button>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".order_btn").on('click', function(){
                var grandTotal = 0;
                $(".total .subTotal").html(grandTotal);
            });
        });
    </script>
</body>
</html>
<?php
    mysqli_close(db());
?>
