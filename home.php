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
    <title>Dior Cosmetic</title>
    <!-- Bootstrap5.2. cdn Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <!-- Home page -->
    <div class="home">
        <div class="homeImg">
            <a href="home.php"> <img src="images/img1.webp" alt="home_img"> </a>
            <a href="shop.php" class="shop_btn">Shop Now</a>
        </div>
    
        <div class="gallery">
            <div class="galleryContent">
                <a href="detail.php?id=6&&userId=<?php echo $userId ?>" class="galleryImg"><img src="images/img2.jpg" alt="image1"> </a>
                <h2>SUMMER LOOK</h2>
                <a href="detail.php?id=6&&userId=<?php echo $userId ?>" class="shop_btn">SHOP NOW</a>
            </div>
            <div class="galleryContent gallery2">
                <a href="detail.php?id=5&&userId=<?php echo $userId ?>" class="galleryImg"><img src="images/img3.webp" alt="image2"> </a>
                <h2>DIOR BACKSTAGE</h2>
                <a href="detail.php?id=5&&userId=<?php echo $userId ?>" class="shop_btn">SHOP NOW</a>
            </div>
            <div class="galleryContent gallery3">
                <a href="detail.php?id=9&&userId=<?php echo $userId ?>" class="galleryImg"><img src="images/img4.webp" alt="image3"> </a>
                <h2>PERFECT FOUNDATION</h2>
                <a href="detail.php?id=9&&userId=<?php echo $userId ?>" class="shop_btn">SHOP NOW</a>
            </div>
        </div>
    </div>

   <?php include 'newArrivals.php'; ?>

   <div class="homeCollection">
        <div class="collection">
            <div class="collectionImg">
                <img src="images/img5.webp" alt="Image5">
            </div>
            <div class="collectContent">
                <p>For the creation of the new collection, Dior Forever and Rouge Dior are teamed with the Gris Dior fragrance from La Collection Privée Christian Dior. Discover a bold and elegant look that echoes Christian Dior's famous début runway show.</p>
                <p>The new Diorshow collection embraces florality: Dior eye makeup essentials, the new mascaras and eyeshadows reveal for the 1st time more natural* formulas, infused with cornflower extract.</p>
                <p>Echoing its inspiring character, the new Miss Dior fragrance is like an olfactory “millefiori”.</p>
                <div class="collectionBtn" id="btncol1">
                    <a href="detail.php?id=3&&userId=<?php echo $userId ?>" class="discover_btn" id="discover_btn">Discover</a>
                </div>
            </div>
        </div>

        <div class="collection collet1">
            <div class="collectContent">
                <p>An iconic fragrance, J’adore Eau de Parfum is the grand feminine floral by the House of Dior.</p>
                <p>Finely crafted down to the last detail, like a custom-made flower, J'adore is a bouquet of the most beautiful flowers from around the world. </p>
                <p>The New Look limited edition available in 2 finishes offers 24h* of a perfect complexion, while delivering freshness, hydration and high SPF protection to the skin , is dressed in the limited-edition houndstooth motif, symbol of the Christian Dior couture house.</p>
                <div class="collectionBtn" id="btncol2">
                    <a href="shop.php" class="shop_btn">SHOP NOW</a>
                </div>
            </div>
            <div class="collectionImg" id="collImg2">
                <img src="images/img6.webp" alt="Image6">
            </div>
        </div>
   </div>
    
    <?php include 'topSeller.php'; ?>

    <div class="reviewPro">
        <h2>DIOR FOREVER</2>
        <h3>Yara Shahidi is wearing Dior Forever foundation and the shade 200 NUDE TOUCH velvet finish of Rouge Dior lipstick.</h3>
        <div class="reviewProImg">
            <img src="images/img13.webp" alt="Image13">
            <img src="images/img10.webp" alt="Image10">
            <img src="images/img14.webp" alt="Image14">
        </div>
        <a href="detail.php?id=9&&userId=<?php echo $userId ?>" class="discover_btn" id="discover_btn">Discover</a>
    </div>

    <?php include 'footer.php'; ?>

    <!-- Bootstrap5 cdn JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>