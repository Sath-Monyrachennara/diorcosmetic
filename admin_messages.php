<?php
    require_once('database.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $deletedCon = db()->query("DELETE FROM contactus WHERE id = '$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>      
    <div class="message">
        <h1 class="heading">Messages</h1>
        <div class="show_message">
            <div class="mesRow">
                <?php
                    $messages = db()->query("SELECT * FROM contactus");
                    $num_row = mysqli_num_rows($messages);
                    for($i=1; $i<=$num_row; $i++){
                        if($row = mysqli_fetch_array($messages)) {
                            $id = $row['id'];
                            $userId = $row['user_id'];
                            $name = $row['name'];
                            $number = $row['number'];
                            $email = $row['email'];
                            $message = $row['message'];
                        }
                ?>
                        <div class="mess showResult">
                            <p>User id : <span class="userId"><?php echo $userId ?></span> </p>
                            <p>Name : <span class="name"><?php echo $name ?></span> </p>
                            <p>Number : <span class="number"><?php echo $number ?></span> </p>
                            <p>Email : <span class="email"><?php echo $email ?></span> </p>
                            <p>Message : <span class="messa"><?php echo $message ?></span> </p>
                            <button type="submit" class="delete_btn" id="<?php echo $id ?>">Delete Message</button>
                        </div>
                <?php
                        if($i%3 ==0){
                            echo '</div>';
                            echo '<div class="mesRow">';
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
                    url:'admin_messages.php',
                    method:'post',
                    data:{id:id},
                    success:function(){
                        alert("Message is deleted.");
                        window.location.href = 'admin_messages.php';
                    }
                });
            });
        });
    </script>
    <!-- JavaScript File -->
    <script src="js/admin_script.js"></script>
</body>
</html>