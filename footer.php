<?php
    global $number, $message, $email;
    if(isset($_POST['sendMess'])) {
        $number = $_POST['number'];
        $message = $_POST['messages'];
    }
    $contact = db()->query("SELECT * FROM contactus WHERE id = '$userId' AND (number = '$number' AND message = '$message')");
    $row = mysqli_num_rows($contact);
    
    if($row == 0 && !empty($_POST['sendMess']) && isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        db()->query("INSERT INTO contactus (user_id, name, email, number, message) VALUES('$userId', '$userName', '$email', '$number', '$message')");
    }else{
    
    }
    
?>

<section class="footer">
    <a href="home.php" class="footerHead">DiOR</a>
    <div class="footer_link">
        <div class="links">
            <h2>Quick Links</h2>
            <ul>
                <li> <a href="home.php">Home</a> </li>
                <li> <a href="shop.php">Shop</a> </li>
                <li> <a href="order.php">Order</a> </li>
                <li> <a href="contact.php">Contact</a> </li>
                <li> <a href="about.php">About</a> </li>
            </ul>
        </div>
        <div class="links">
            <h2>Extra Links</h2>
            <ul>
                <li> <a href="signIn.php">Sign In</a> </li>
                <li> <a href="register.php">Register</a> </li>
                <li> <a href="search.php">Search</a> </li>
                <li> <a href="cart.php">Cart</a> </li>
                <li> <a href="checkout.php">Checkout</a> </li>
            </ul>
        </div>
        <div class="contact_info links">
            <h2>Contact Info</h2>
            <ul>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <p>Email: <span>Dior@Gmail.com</span></p>
                </li>
                <li>
                    <i class="fa-solid fa-clock"></i>
                    <p>Opening Hours: <span>24/7</span></p>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <p>Number: <span>+123-456-7890</span></p><br>
                </li>
                <li>
                    <i class="fa-brands fa-telegram"></i>
                    <p>Telegram: <span>+123-456-7890</span></p>
                </li>
                <li>
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Location: <span>Singapore, China, Thailand</span></p>
                </li>
            </ul>
        </div>
        <div class="links contact">
            <h2>Contact Us</h2>
            <p>Contact us for more information</p>
            <form action="" method="post">
                <input type="number" class="number" name="number" placeholder="Phone numbers">
                <input type="text" class="messages" name="messages" placeholder="Say something...">
                <button type="submit" class="subscribe_btn" name="sendMess">Send Messages</button>
            </form>
        </div>

    </div>

    <div class="iconsLink">
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-linkedin-in"></i>
    </div>
    <div class="name_designer">
        <p>Created By <span>Ms.Nara</span> | All Rights Reserved!</p>
    </div>
</section>