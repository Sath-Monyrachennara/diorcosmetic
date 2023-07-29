<?php
    require_once('database.php');
  /*  session_start();
    if($_SESSION['userType'] == 'admin') { */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page </title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>    
    <section class="dashboard">
        <h1 class="heading">dashboard</h1>
        <div class="box-container">
            <div class="box">
                <?php
                    $pending = db()->query("SELECT payment_status FROM orders");
                    $row = mysqli_num_rows($pending);
                ?>
                <h3>$ <span> <?php echo $row ?>/-</span></h3>
                <p>Total Pendings</p>
            </div>
        
            <div class="box">
                <?php
                    $price = db()->query("SELECT price FROM orders");
                    $num_row = mysqli_num_rows($price);
                    $total_payment = 0;
                    for($i=1; $i<=$num_row; $i++){
                        if($row = mysqli_fetch_array($price)) {
                            $payment = $row['price'];
                        }
                        $total_payment = $total_payment + $payment;
                    }
                ?>
                <h3>$ <span><?php echo $total_payment ?>/-</span></h3>
                <p>Completed Payments</p>
            </div>
        
            <div class="box">
                <?php
                    $orders = db()->query("SELECT * FROM orders");
                    $num_row = mysqli_num_rows($orders);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>Order Places</p>
            </div>
        
            <div class="box">
                <?php
                    $product = db()->query("SELECT * FROM products");
                    $num_row = mysqli_num_rows($product);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>Products Added</p>
            </div>
        </div>
      
        <div class="box-container">
            <div class="box">
                <?php
                    $user = db()->query("SELECT * FROM users WHERE user_type = 'user'");
                    $num_row = mysqli_num_rows($user);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>Normal Users</p>
            </div>

            <div class="box">
                <?php
                    $admin = db()->query("SELECT * FROM users WHERE user_type = 'admin'");
                    $num_row = mysqli_num_rows($admin);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>Admin Users</p>
            </div>

            <div class="box">
                <?php
                    $totalUser = db()->query("SELECT * FROM users");
                    $num_row = mysqli_num_rows($totalUser);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>Total Accounts</p>
            </div>
    
            <div class="box">
                <?php
                    $messages = db()->query("SELECT * FROM contactus");
                    $num_row = mysqli_num_rows($messages);
                ?>
                <h3> <span><?php echo $num_row ?></span></h3>
                <p>New Messages</p>
            </div>
        </div>
    </section>
    <!-- JavaScript File -->
    <script src="js/admin_script.js"></script>
</body>
</html>
<?php
    mysqli_close(db());
?>