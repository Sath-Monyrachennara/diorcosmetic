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
    <title>About Us</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>     
    <section class="aboutUs">
        <h2>About Us</h2>
        <div class="about">
            <h3 id="stroyHeader">The story of DIOR</h3>
            <div class="aboutCont">
                <div class="content">
                    <img src="images/img15.webp" alt="Image15">
                    <div class="cont_para" id="cont_para1">
                        <h2>Musée des Les Arts Décoratifs</h2>
                        <div class="para">
                            <p>
                                The exhibition was curated by Olivier Gabet and Florence Müller, and the integral, 
                                inspired exhibition design was led by Nathalie Criniére. To recognize scenography alongside curation is at the heart of the exhibition’s success.
                            </p>
                            <p>
                                The exhibition successfully achieved its intended scope to present 70 years of couture offerings from the House of Dior, 
                                rather than focusing on Christian Dior as a singular designer. The galleries focused on unifying elements across the eras of Dior, 
                                successfully incorporating the work of Dior’s head designers. So much so that the exhibition title proved problematic, 
                                as it was so clearly not focused on a single designer but instead worked to draw connection on the emotion, inspiration and legacy of each figure.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="cont_para" id="cont_para2">
                        <h2>Designer of Dreams</h2>
                        <div class="para">
                            <p>
                                2017 marked the 70th anniversary of the founding of the House of Dior and it thus seems inevitable that a blockbuster exhibition detailing its history would be hosted in couture’s home city of Paris,
                                at the Musée des Les Arts Décoratifs. Christian Dior, Couturier du Rêve was presented on a monumental scale, covering 3,000 square feet with upwards of 300 outfits and 1,000 accessories on view. 
                            </p>
                            <p>
                                A sweeping overview of Dior’s work would hardly be sufficient for one of the preeminent couturiers, and brands, of the 20th century. 
                                Nor would an examination of Christian Dior himself be appropriate, despite the title’s suggestion of a single designer of dreams. 
                                Therefore, this exhibition took the House of Dior as a whole entity, with particular characteristics brought by its diverse crop of lead designers but with a fundamental identity and ability to amaze.
                            </p>
                            <p>
                                It is perhaps impossible to discuss Christian Dior as a fashion designer without reference to his 1947 collection that is now synonymous with post-war recovery. 
                                Though it opened in a reflection of his early life, the exhibition addressed Dior as a purveyor of this historical shift. 
                                The exhibition thoughtfully portrayed the spirit and founding principles of Christian Dior and his immense role in mid-century fashion, despite large proportions of the objects coming from other head designers.
                            </p>
                        </div>
                    </div>
                    <img src="images/img16.jpg" alt="Image16" id="para2Img">
                </div> 
            </div>

            <div class="aboutDetail">
                <div class="aboutContent">
                    <div class="contentEach">
                        <img src="images/img18.webp" alt="Image18">
                        <p>CINEMA</p>
                    </div>         
                    <div class="contentEach">
                        <img src="images/img19.webp" alt="Image19">
                        <p>A PASSION FOR GARDENS AND FLOWERS</p>
                    </div>
                    <div class="contentEach">
                        <img src="images/img20.webp" alt="Image20">
                        <p> 30, avenue Montaigne 30, AVENUE MONTAIGNE</p>
                    </div>
                </div>
                
                <div class="aboutContent">
                    <div class="contentEach">
                        <img src="images/img21.jpg" alt="Image21">
                        <p>CHRISTIAN DIOR AND ARTISTS</p>
                    </div>
                    <div class="contentEach">
                        <img src="images/img23.webp" alt="Image23">
                        <p>THE VILLA IN GRANVILLE</p>
                    </div>
                    <div class="contentEach">
                        <img src="images/img22.webp" alt="Image22">
                        <p>THE NEW LOOK REVOLUTION</p>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <?php include 'footer.php'; ?>    
    <!-- JavaScript File -->
    <script src="js/script.js"></script>   
</body>
</html>