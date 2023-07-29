<?php
    session_start();
    require_once('database.php');
    
    global $email, $password, $userName, $userId;
    if(isset($_POST['signIn_btn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    if(!empty($email) && !empty($password)){
        $result = db()->query("SELECT * FROM users WHERE email = '$email' AND passwords = '$password'");
        if(mysqli_num_rows($result) === 1 ){
            if($row = mysqli_fetch_array($result)){
                $_SESSION['user_Id'] = $row['id'];
                $_SESSION['userName'] = $row['last_name']." ".$row['first_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['passwords'];
                $_SESSION['userType'] = $row['user_type'];
                
                if($_SESSION['userType'] == 'admin'){
                    header('Location: admin_page.php');
                }         
            }
        }
    }

    if(isset($_SESSION['user_Id'])){
        $userId = $_SESSION['user_Id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In </title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awswesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="signInForm">
        <h2>Sign In</h2>
        <div class="signIn_info">
            <div class="signInDeta">
                <h3>WELCOME BACK.</h3>
                <p>Sign in with your email and password.</p>
            </div>

            <form action="" method="post">
                <input type="email" required placeholder="Email" id="email" name="email">
                <input type="password" required placeholder="Password" id="password" name="password">
                <button type="submit" id="signIn_btn" name="signIn_btn">Sign In</button>
                <small>don't have an account? <a href="register.php">register now</a> </small>
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
