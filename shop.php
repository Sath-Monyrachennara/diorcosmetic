<?php
    session_start();
    require_once('database.php');
    global $userId;
    if(isset($_SESSION['user_Id'])) {
        $userId = $_SESSION['user_Id'];
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
    <title>Shop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?> 
    <section class="shop">
        <h1>Latest Products</h1>
        <div class="shopPro">
            <div class="row" id="row1">
            <?php
                $result = db()->query("SELECT * FROM products");
                $num_row = mysqli_num_rows($result);
                $num = 1;

                for($i=1; $i<=$num_row; $i++){
                    if($row=mysqli_fetch_array($result)){
                        $id = $row['id'];
                        $image = $row['image'];
                        $pro_name = $row['pro_name'];
                        $pro_price = $row['pro_price'];    
                    }
            ?>
                    <div class="col">
                        <a href="detail.php?id=<?php echo $id ?>"> <img src="images/<?php echo $image ?>" alt="<?php echo $image ?>"> </a>
                        <p class="proName"><?php echo $pro_name ?></p>
                        <p class="proPrice">$<?php echo $pro_price ?>.00</p>
                        <p id="userId" style="display:none;"><?php echo $userId ?> </p>
                        <div class="button">
                            <button type="submit" class="addCart_btn" id=<?php echo $id ?> name="addCart_btn">Add To Cart</button>
                            <a href="detail.php?id=<?php echo $id ?>" class="detail_btn" name="detail_btn">View Details</a>
                        </div>
                    </div>
            <?php
                    if($i%3 == 0){
                        $num = $num + 1;
                        echo '</div>';
                        echo '<div class="row" id="row'.$num.'">';
                    }
                }
            ?>
            </div>
        </div>
        <div class="showPage_btn" >
            <button  id="pre">Previous</button>
            <button  id=1>1</button>
            <button  id=2>2</button>
            <button  id=3>3</button>
            <button  id="next">Next</button>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var qty = 1;
            var counter = 0;
            var btn = 1;
            var userId = $("#userId").text();
            
            $(".addCart_btn").on("click", function(){
                var id = this.id;
                counter = counter + 1;

                $.ajax({
                    url:'cart.php',
                    method:'post',
                    data:{id:id, qty:qty},
                    success:function(){
                        if(userId == 0 ) {
                            alert("You can\'t submit this form. Because you didn\'t have an account yet!");
                        }else {
                            alert("Your product is added!");
                            var cartNum = $(".cart_num sup").text();
                            var totalCounter;

                            if(counter != cartNum){
                                totalCounter = parseInt(cartNum) + 1;
                            }else {
                                totalCounter = counter;
                            }
                            $(".cart_num sup").html(totalCounter);
                        }                  
                    }
                });
            });

            $(".showPage_btn button").on("click", function(){
                var value = this.id;

                if(value == 'pre'){
                    btn = parseInt(btn) - 1;
                }else if(value == 'next'){ 
                    btn = parseInt(btn) + 1;
                }else {
                    btn = parseInt(value);
                }

            //    console.log(btn);
                if(btn>0 && btn<4){
                    if(btn == 1){
                        $("#row1, #row2").css('display','flex');
                        $("#row3, #row4, #row5, #row6").css('display', 'none');
                    }else if(btn == 2){
                        $("#row3, #row4").css('display','flex');
                        $("#row1, #row2, #row5, #row6").css('display', 'none');
                    }else{
                        $("#row5, #row6").css('display','flex');
                        $("#row1, #row2, #row3, #row4").css('display', 'none');
                    }

                }else {
                    $("#row1, #row2").css('display','flex');
                    $("#row3, #row4, #row5, #row6").css('display', 'none');
                    btn = 1;
                }          
            });
        });
    </script>

    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>