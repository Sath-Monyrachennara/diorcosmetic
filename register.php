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
    global $email, $firstName, $lastName, $password, $userType;
    if(isset($_POST['register_btn'])) {
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['passwords'];
        $userType =$_POST['userType'];
    }

    $compare = db()->query("SELECT * FROM users WHERE email = '$email'");
    $num_row = mysqli_num_rows($compare);

    if($num_row <= 0) {
        $insertData = db()->query("INSERT INTO users(email, first_name, last_name, passwords, user_type) VALUES('$email', '$firstName', '$lastName', '$password', '$userType') ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register </title>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?> 
    <div class="registerForm">
        <h2>Register</h2>
        <div class="registerData">
            <div class="regDetail">
                <p>Create an account and benefit from a more personal shopping experience, and quicker online checkout.</p>
                <p>All fields are mandatory.</p>
            </div>

            <form action="" method="post">
                <input type="email" required placeholder="Email" id="email" name="email">
                <input type="text" required placeholder="First name" id="firstName" name="firstName">
                <input type="text" required placeholder="Last name" id="lastName" name="lastName">
                <input type="password" required placeholder="Password" id="password" name="passwords">
                <select name="userType" id="userType" required>
                    <option value="" disabled selected>User Type</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
                <button type="submit" id="register_btn" name="register_btn">Register Now</button>
                <small>already have an account? <a href="signIn.php">Sign In</a> </small>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <!-- JavaScript File -->
    <script src="js/script.js"></script>
</body>
</html>
<?php
    mysqli_close(db());
?>
