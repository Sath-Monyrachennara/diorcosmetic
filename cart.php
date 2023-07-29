<?php
    session_start();
    require_once('database.php');
    global $userId, $userName, $price, $qty, $proId;
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

    /* Add to cart */
    if(isset($_POST['id'])){
        $proId = $_POST['id'];
        $qty = $_POST['qty'];
    }

    $selectedData = db()->query("SELECT * FROM products WHERE id = '$proId'");
    if($row = mysqli_fetch_array($selectedData)){
        $name = $row['pro_name'];
        $price = $row['pro_price'];
        $image = $row['image'];
    }
    $subTotal = $price * $qty;

    if(!empty($proId) && $userId !=0){
        $insertData = db()->query("INSERT INTO cart(user_id, pro_name, pro_price, images, quantity, sub_total) VALUES('$userId', '$name', $price, '$image', $qty, $subTotal)");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section class="cart">
        <h2>Products Added</h2>
        <div class="showCartPro">
            <div class="proAdded">
                <?php
                    global $id, $num_row;
                    $grandTotal = 0;
                    $result = db()->query("SELECT * FROM cart WHERE user_id = '$userId'");
                    $num_row = mysqli_num_rows($result);

                    if($num_row >0){
                        for($i=1; $i<=$num_row; $i++){
                            if($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $pro_name = $row['pro_name'];
                                $pro_price = $row['pro_price'];
                                $image = $row['images'];
                                $qty = $row['quantity'];
                                $subTotal = $row['sub_total'];
                            }        
                ?>
                            <div class="Cartproduct">
                                <?php
                                    if(strlen($pro_name)<=30) {
                                        echo ' <a href="deletedProducts.php?id='.$id.'" class="fa-solid fa-square-xmark shortText"> </a> ';
                                    }else {
                                        echo ' <a href="deletedProducts.php?id='.$id.'" class="fa-solid fa-square-xmark longText"> </a> ';
                                    }
                                ?>
                                <img src="images/<?php echo $image ?>" alt="Image9">
                                <p><?php echo $pro_name ?></p>
                                <p class="cartProPrice">$<span id="proPrice<?php echo $id ?>"><?php echo $pro_price ?></span>.00</p>
                                <div class="update">
                                    <input type="number" class="updateQty" name="updateQty" value=<?php echo $qty ?> id="<?php echo $id ?>">
                                    <button type="submit" class="update_btn" id="<?php echo $id ?>">UPDATE</button>
                                </div> 
                                <p class="subTotal">Sub Total: $<span id="prosubTotal<?php echo $id ?>"><?php echo $subTotal ?></span>.00 </p>
                            </div>

                <?php
                            $grandTotal = $grandTotal + $subTotal;
                            if($i%3 == 0){
                                echo '</div>';
                                echo '<div class="proAdded">';
                            }
                        }
                    }else {
                        echo '<p id="cartEmpty">Your cart is empty!</p>';
                    }
                ?>
            </div>

        </div>
        <div class="deleteAll">
            <?php 
                if($num_row > 0){
                    echo '<a href="deletedProducts.php" class="deleteAll_btn">Delete All</a>';               
                }else {
                    echo '<a href="deletedProducts.php" class="disLink">Delete All</a>';
                }     
            ?>
        </div>
        <div class="showGrandTotla">
            <h2>Grand Total: $<span id="grandTotal"> <?php echo $grandTotal ?> </span>.00/- </h2>
            <div class="showBtn">
                <a href="shop.php" class="continuceShopping">Continuce Shopping</a>
                <?php
                    if($num_row > 0){
                        echo '<a href="checkOut.php" class="checkOut">Proceed To Checkout</a>';
                    }else {
                        echo '<a href="checkOut.php" class="disCheckout">Proceed To Checkout</a>';
                    }
                ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            var qty;
            var price, subTotal, newsubTotla, selectPrice, selectsubTotal, oldsubTotal, total;
            var grandTotal;
            $(".updateQty").on("change", function(){
                qty = $(this).val();
            });

            $(".update_btn").on("click", function(){
                var id = this.id;
                selectPrice = "#proPrice" + id;
                price = $(selectPrice).text();
                price = Number(price);
                $.ajax({
                    url:'updateModel.php',
                    method:'post',
                    data:{id:id, qty:qty, price:price},
                    success:function(data){
                        alert("Product is updated!");
                        subTotal = price * qty;
                        selectsubTotal = "#prosubTotal" + id;
                        oldsubTotal = $(selectsubTotal).text();
                        oldsubTotal = Number(oldsubTotal);

                        if(oldsubTotal < subTotal){
                            grandTotal = subTotal - oldsubTotal;
                        //    console.log(grandTotal);
                        }else if(oldsubTotal > subTotal){
                            grandTotal = oldsubTotal - subTotal;
                        //    console.log(grandTotal);
                        }else {
                            grandTotal = subTotal;
                        //    console.log(grandTotal);
                        }
                        // For sub total
                        newsubTotla = $(selectsubTotal).html(subTotal);
                        
                        // For grand total
                        selectTotal = $("#grandTotal").text();
                        selectTotal = Number(selectTotal);
                        total = selectTotal + grandTotal;
                        total = $("#grandTotal").html(total);
                    }
                });
            });
        });

    </script>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>
<?php
    mysqli_close(db());
?>
