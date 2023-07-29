<?php
    session_start();
    require_once('database.php');
    global $userId, $userName;
    if(isset($_SESSION['user_Id'])) {
        $userId = $_SESSION['user_Id'];
        $userName = $_SESSION['userName'];
    }
    $comid = db()->query("SELECT * FROM users WHERE id = '$userId'");
    $row = mysqli_num_rows($comid);
    if($row >0 ) {
        $userId = $_SESSION['user_Id'];
    }else {
        $userId = 0;
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?> 
    <section class="order">
        <h2>Oreders</h2>
        <?php
            if(isset($_SESSION['user_Id'])){
                $userId = $_SESSION['user_Id'];
        ?>
                <div class="showOrders">
                    <?php
                        $result = db()->query("SELECT * FROM orders WHERE user_id = '$userId'");
                        $num_row = mysqli_num_rows($result);

                        $numCart = db()->query("SELECT * FROM cart");
                        $row = mysqli_num_rows($numCart);
                        
                        if($num_row >0 ){
                            for($i=1; $i<=$num_row; $i++){
                                if($row = mysqli_fetch_array($result)){
                                    $placeOn = $row['place_on'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $number = $row['number'];
                                    $address = $row['address'];
                                    $payment_method	= $row['payment_method'];
                                    $orders = $row['order_product'];
                                    $price = $row['price'];
                                    $payment_status	= $row['payment_status'];
                                }
                    ?>
                                <div class="yourOrder">
                                    <p>Place on : <span><?php echo $placeOn ?></span> </p>
                                    <p>Name : <span><?php echo $name ?></span> </p>
                                    <p>Email : <span><?php echo $email ?></span> </p>
                                    <p>Number : <span><?php echo $number ?></span> </p>
                                    <p>Address : <span><?php echo $address ?></span> </p>
                                    <p>Payment method : <span><?php echo $payment_method ?></span> </p>
                                    <p id="orders">Your orders : <span><?php echo $orders ?></span> </p>
                                    <p>Your price : <span>$<?php echo $price ?>.00/-</span> </p>
                                    <?php
                                        if($payment_status == 'completed'){
                                            echo '<p>Payment status : <span style="color: rgb(26, 95, 26);">'.$payment_status.'</span> </p>';
                                        }else {
                                            echo '<p>Payment status : <span style="color: rgb(161, 40, 40);">'.$payment_status.'</span> </p>';
                                        }
                                    ?>
                                </div>    
                    <?php      
                            }
                        }else {
                            echo '<p id="cartEmpty">Your cart is empty!</p>';
                        }
                    ?>
                </div>
        <?php
            }else {
                echo '<p id="alertMess">Do not have an account, please go to sign up!<br> <span id="colorGr">Thanks you.</span></p>';
            }
        ?>
    </section>

    <?php include 'footer.php'; ?>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>
<?php
    mysqli_close(db());
?>
