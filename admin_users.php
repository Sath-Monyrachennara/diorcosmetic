<?php
    require_once('database.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $deleted = db()->query("DELETE FROM users WHERE id = '$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?> 
    <div class="userAcc">
        <h1 class="heading">user accounts</h1>
        <div class="show_acc">
            <div class="userRow">
                <?php
                    $user = db()->query("SELECT * FROM users");
                    $num_row = mysqli_num_rows($user);
                    for($i=1; $i<=$num_row; $i++){
                        if($row = mysqli_fetch_array($user)) {
                            $userId = $row['id'];
                            $name = $row['last_name'] ." ". $row['first_name'];
                            $email = $row['email'];
                            $userType = $row['user_type'];
                        }
                ?>
                        <div class="account showResult">
                            <p>User id : <span class="userId"><?php echo $userId ?></span> </p>
                            <p>Username : <span class="userName"><?php echo $name ?></span> </p>
                            <p>Email : <span class="email"><?php echo $email ?></span> </p>
                            <p>User type : <span class="userType"><?php echo $userType ?></span> </p>
                            <div class="button">
                                <button type="submit" class="delete_btn" id="<?php echo $userId ?>">Delete User</button>
                            </div>
                        </div>   
                <?php
                        if($i%3 ==0){
                            echo '</div>';
                            echo '<div class="userRow"';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("document").ready(function(){
            $(".delete_btn").on('click', function(){
                var id = this.id;
                $.ajax({
                    url:'admin_users.php',
                    method:'post',
                    data:{id:id},
                    success:function(){
                        alert("User is deleted.");
                        window.location.href = 'admin_users.php';
                    }
                });
            });
        });
    </script>
    <!-- JavaScript File -->
    <script src="js/admin_script.js"></script>
</body>
</html>