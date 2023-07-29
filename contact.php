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
    
    global $fullName, $email, $number, $message, $userId;
    if(isset($_POST['submit_btn'])){
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];
    }

    if(isset($_POST['submit_btn']) && $userId ==0){
        echo '<script>alert("You can\'t submit this form. Because you didn\'t have an account yet!");</script>';
    }

    $compare = db()->query("SELECT * FROM `contactus` WHERE message != '$message'");
    $num_row = mysqli_num_rows($compare);
    if($num_row >0 && $userId !== 0) {
        $insertData = db()->query("INSERT INTO `contactus`(user_id, name, email, number, message) VALUES('$userId', '$fullName', '$email', '$number', '$message')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>     
    <section class="contactUs">
        <h2>Contact Us</h2>
        <div class="contactInfo">
            <div class="contactImg">
                <img src="images/img7.webp" alt="Image7">
            </div>
            <div class="contactForm">
                <h2>Send Us A Message</h2>
                <form action="" method="post">
                    <div class="lables inputForm">
                        <label for="fullName">Full Name: </label>
                        <label for="email">Email: </label>
                        <label for="number">Phone: </label>
                        <label for="message">Message: </label>
                    </div>          
                    <div class="inputs inputForm">
                        <input type="text" id="fullName" class="fullName" name="fullName" placeholder="Enter full name" required>
                        <input type="email" id="email" class="email" name="email" placeholder="Enter email address" required>
                        <input type="number" id="number" class="number" name="number" placeholder="Enter phone number" required>
                        <input type="text" id="message" class="message" name="message" placeholder="Your Comment" required>
                    </div>
                    <input type="submit" id="submit_btn" name="submit_btn" value="Submit">
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>