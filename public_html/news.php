<?php
@include 'config.php';
session_start();

$comment = false;


if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $comment = true;

    $select = " SELECT * FROM news WHERE id = '1234567'";

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $like = $row['likes'];
            $dislike = $row['dislikes'];
            $comments = $row['comment'];
        }
    }
}

if(isset($_POST['submit'])){
    $commentss = mysqli_real_escape_string($conn, $_POST['comments']);
    $myObj->name = $name;
    $myObj->comments = $commentss;

    $myJSON = json_encode($myObj);

    echo "$myJSON";
    $insert = "UPDATE news SET comment='$myJSON' WHERE id='1234567'";
    mysqli_query($conn, $insert);


};

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <!-- Add icon library -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <title>Online News Feed</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            Online News Feed
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#sportsNews">Sports</a></li>
                <li><a href="#businessNews">Business</a></li>
                <li><a href="#techNews">Technology</a></li>
                <?php
                if($comment){
                    echo '<li><a href="logout.php" style="font-weight:bold;">LOGOUT</a></li>';
                }else{
                    echo '<li><a href="login.php" style="font-weight:bold;">LOGIN</a></li>';
                }
                ?>
            </ul>
            <div class="bar">
                <i class="open fa-solid fa-bars-staggered"></i>
                <i class="close fa-solid fa-xmark"></i>
            </div>
        </nav>
    </div>
    <iframe style="width: 100%;height: 500px;"src="<?php echo $_GET['url']?>" title="description"></iframe>
        <div class="reaction" style="width: 200px;height: 400px;"></div>
        <div class="reaction" style="width: 500px;height: 500px;">
    <?php 
    if($comment){
        $cmt = json_decode($comments);
        echo '
        <form action="" method="post" autocomplete="off">
        <i onclick = "like()" class="fa-regular fa-thumbs-up fa-2x"></i>
        <p id="like">'.$like.'</p>

        <i onclick = "dislike()" class="fa-regular fa-thumbs-down fa-2x"></i>
        <p id="like">'.$dislike.'</p>

        <div>'.$cmt['name'].': '.$cmt['comments'].'</div>

        <p>'.$name.'</p>
            <input type="text" name="comments" placeholder="Comments......">
            <input type="submit" name="submit" value="Comment">
        </form>
        
        ';    
    }else{
        echo "hi";
    }
    ?>

    
    </div>
    <div class="footer">
        <div class="box">
            <div class="left">
                <div class="categories">
                    <p>Categories</p>
                    <div>
                        <p>Sports</p>
                    </div>
                    <div>
                        <p>Business</p>
                    </div>
                    <div>
                        <p>Technology</p>
                    </div>
                </div>
                <div class="contactUs">
                    <div class="contact">
                        <p>Contact Us</p>
                        <div>Phone Number - <span>012-34567890</span></div>
                        <div>Email - <span>abc123@gmail.com</span></div>
                        <div>Address - <span>Penang, Malaysia</span></div>
                    </div>
                    
                </div>
            </div>
            <div class="right">
                <div class="newsletter">
                    <p>Haven't subscribed?</p>
                    <div class="email">
                        <input type="email" placeholder="Enter Your Email Here">
                        <button><a href="register.php">Subscribe</a></button>

                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>


    


    <!-- <script src="./index.js"></script> -->
    <script>
        function like(){
            // x.classList.toggle("fa-solid");
            // x.preventDefault();
            <?php $like = $like + 1; 
            $insert = "UPDATE news SET likes='$like' WHERE id='1234567'";
            mysqli_query($conn, $insert);
            
            ?>
            document.getElementById('like').innerHTML = <?php echo "$like" ?>;

        }
        function dislike(x){
            x.classList.toggle("fa-solid");
        }

    </script>
</body>
</html>