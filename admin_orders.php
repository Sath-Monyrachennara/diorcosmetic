<?php
    require_once('database.php');
    global $id, $status, $deletedId;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
    }
    $updateStatus = db()->query("UPDATE `orders` SET payment_status = '$status' WHERE id = '$id'");
    
    if(isset($_GET['id'])){
        $deletedId = $_GET['id'];
    }
    $deletedOrder = db()->query("DELETE FROM `orders` WHERE id = '$deletedId'");
    
    if($deletedOrder == 1 || $updateStatus == 1){
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>   
    <div class="orders">
        <h1 class="heading">placed orders</h1>
        <div class="showOrder">
            <div class="orderRow">
                <?php
                    $orders = db()->query("SELECT * FROM orders");
                    $num_row = mysqli_num_rows($orders);
                    for($i=1; $i<=$num_row; $i++) {
                        if($row = mysqli_fetch_array($orders)){
                            $id = $row['id'];
                            $userId = $row['user_id'];
                            $status = $row['payment_status'];
                            $placeOn = $row['place_on'];
                            $name = $row['name'];
                            $number = $row['number'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $total_product = $row['order_product'];
                            $total_price = $row['price'];
                            $payment_method = $row['payment_method'];
                        }
                ?>
                        <div class="showResult">
                            <p>User id : <span class="userId"><?php echo $userId ?></span> </p>
                            <p>Place on : <span class="placeOn"><?php echo $placeOn ?></span> </p>
                            <p>Name : <span class="name"><?php echo $name ?></span> </p>
                            <p>Number : <span class="number"><?php echo $number ?></span> </p>
                            <p>Email : <span class="email"><?php echo $email ?></span> </p>
                            <p>Address : <span class="address"><?php echo $address ?></span> </p>
                            <p>Total products : <span class="total_pro"><?php echo $total_product ?></span> </p>
                            <p>Total price : <span class="total_price">$<?php echo $total_price ?>/-</span> </p>
                            <p>Payment method : <span class="payment_method"><?php echo $payment_method ?></span> </p>

                            <form action="admin_orders.php" class="payment_status" name="payment_status">
                                <select>
                                    <option value="" id="payStatus" disabled selected ><?php echo $status ?></option>
                                    <option value="pending">pending</option>
                                    <option value="completed">completed</option>
                                </select>
                                <a href="" id="<?php echo $id ?>" class="update_btn">Update</a>
                                <a href="" id="<?php echo $id ?>" class="delete_btn">Delete</a>
                            </form>
                        </div>
            
                <?php
                        if($i%3 == 0) {
                            echo '</div>';
                            echo '<div class="orderRow">';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("document").ready(function(){
            var status;
            $("select").on('change', function(){
                status = this.value;
            });

            $(".update_btn").on('click', function(){
                var id = this.id;
                $.ajax({
                    url: 'admin_orders.php',
                    method: 'post',
                    data: {id:id,status:status},
                    success:function(){
                        alert("Order is updated.");
                    }
                });
            });

            $(".delete_btn").on('click', function(){
                var id = this.id;
                $.ajax({
                    url:'admin_orders.php',
                    method:'get',
                    data:{id:id},
                    success:function(){
                        alert("Order is deleted.");
                    }
                });
            });

        });
    </script>
    <!-- JavaScript File -->
    <script src="js/admin_script.js"></script>
</body>
</html>