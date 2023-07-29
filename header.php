<header class="header">
    <a href="home.php" id="logo">DiOR</a>
    <nav class="navbar">
        <ul>
            <li> <a href="home.php">HOME</a> </li>
            <li> <a href="shop.php">SHOP</a> </li>
            <li> <a href="order.php">ORDER</a> </li>
            <li> <a href="contact.php">CONTACT</a> </li>
            <li> <a href="about.php">ABOUT</a> </li>
            <li> <a href="signIn.php">SIGN IN</a> </li>
        </ul>
    </nav>
    <div class="icons">
        <div id="menu_btn" class="fa-solid fa-bars"></div>
        <i class="fa-solid fa-magnifying-glass" onclick="showResult();" id="search_icon" title="Search button"></i>
        <?php
            if($userId == 0){
                echo '<i class="fa-solid fa-user" id="userIcon" title="Don\'t have an account, please go to register."></i>';
            }else {
                echo '<i class="fa-solid fa-user" onclick="showUsers();" id="userIcon" title="User account"></i>';
            }
        ?>
        <?php
            global $count;
            $results = db()->query("SELECT * FROM cart WHERE user_id = '$userId'");
            $count = mysqli_num_rows($results);
        ?>
        <a href="cart.php" class="cart_num fa-solid fa-bag-shopping" title="Shopping cart"> <sup> <?php echo $count ?> </sup> </a>
    </div>

    <!-- Search -->
    <form class="searchForm" method=”get”>
        <input type="text" id="search" class="search" name="search" placeholder="What are you looking for?">
        <i class="fa-solid fa-magnifying-glass" onclick="showResult();"></i>
    </form>

        <?php
            if(isset($_GET['search'])){
                echo '<div class="searchResult" id="searchResult">';
                $search = $_GET['search'];
                $value = '%' . $search . '%';
                $searchResult = db()->query("SELECT * FROM products WHERE pro_name LIKE '$value'");
                $num_row = mysqli_num_rows($searchResult);
                if($num_row > 0){
                    for($i=1; $i<=$num_row; $i++){
                        if($row = mysqli_fetch_array($searchResult)){
                            $proId = $row['id'];
                            $proName = $row['pro_name'];
                            $proPrice = $row['pro_price'];
                            $proImg = $row['image'];
                        }
        ?>

                        <div class="searchRow">
                            <a href="detail.php?id=<?= $proId ?>"><img src="images/<?= $proImg ?>" alt="Product Img"></a>
                            <div class="searchDetail">
                                <a href="detail.php?id=<?= $proId ?>"><p id="proName"><?= $proName ?></p></a>
                                <p id="proPrice">$<?= $proPrice ?></p>
                            </div>
                        </div>
        <?php
                    }
        ?>

        <?php
                }else {
                    echo '<p id="noResult">Data not found!</p>';
                }
        ?>
                <p id="cancelBtn" onclick="cancel()">Cancel</p>
            </div>
    <?php
        }else {

        }
    ?>
   
    <!-- Show User Accout -->
    <div class="show_userAcc"> 
        <div class="userImg">
            <img src="images/userImg/img1.jpg" alt="User Image">
        </div>
        <p id="userName"><?php echo $_SESSION['userName']; ?></p>
        <p id="email"><?php echo $_SESSION['email']; ?></p>
        <div class="logoutBtn">
            <a href="signUp.php">Sign out</a>
        </div>
    </div>
</header> 
