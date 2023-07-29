<?php
    session_start();
    require_once('database.php');

    global $id, $proDetail_img, $name, $price, $detail, $description, $userId;
    if(isset($_SESSION['user_Id'])) {
        $userId = $_SESSION['user_Id'];
    }
    $comid = db()->query("SELECT * FROM users WHERE id = '$userId'");
    $rows = mysqli_num_rows($comid);
    if($rows >0 ) {
        $userId = $_SESSION['user_Id'];
    }else {
        $userId = 0;
    }

    // Get id from view detail button
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = db()->query("SELECT * FROM products WHERE id = '$id'");
        if($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $proDetail_img = $row['proDetail_img'];
            $name = $row['pro_name'];
            $detail = $row['detail'];
            $price = $row['pro_price'];
            $description = $row['description'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?> 
    <section class="detail">
        <!-- Swiper -->
        <div class="imgDetail swiper mySwiper">
            <div class="imageDetails swiper-wrapper">
                <?php
                    $totalFile = glob("images/$proDetail_img/". "*");
                    foreach($totalFile as $totalFiles)
                    {
                        echo '
                        <div class="showImgDetail swiper-slide">
                            <img src="'.$totalFiles.'" alt="Image">
                        </div>
                        ';
                    }
                ?>
            </div>

            <div class="swiper-button-next" id="nextButton"></div>
            <div class="swiper-button-prev" id="prevButton"></div>
            <div class="swiper-pagination" id="paginationButton"></div>
        </div>

        <div class="proDetail">
            <div class="eachDetail">
                <h2><?php echo $name ?></h2>
                <p class="detailing"><?php echo $detail ?></p>
                <p class="price">$<?php echo $price ?>.00</p>
                <input type="number" name="qty" id="qty" class="qty" value=1 min=1 >
                <p id="userId" style="display:none;"><?php echo $userId ?> </p>
                <button type="submit" class="addCart_btn" id="<?php echo $id ?>" name="addCart_btn">Add To Cart</button>
            </div>

            <div class="proDescription">
                <p class="heading">DESCRIPTION</p>
                <i class="fa-solid fa-chevron-up" onclick="showDescription();" id="arrow_up"></i>
                <div class="para">
                   <p><?php echo $description ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var qty = 1;
            var counter = 0;
            var userId = $("#userId").text();

            $("input[name='qty']").on("input", function() {
                qty = $(this).val();
            });

            $(".addCart_btn").on("click", function() {
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

        });
    </script>
</body>
</html>
<?php
    mysqli_close(db());
?>