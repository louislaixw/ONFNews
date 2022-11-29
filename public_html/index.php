<?php
@include 'config.php';
session_start();

$comment = false;

if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    $comment = true;
};
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Online News Feed</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            Online News Feed
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
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
    <div class="topHeadlines">
        <div class="left">
            <div class="title">
                <h2>Breaking News</h2>
            </div>
            <div class="img" id="breakingImg">
                
            </div>
            <div class="text" id="breakingNews">
                <div class="title">
                    
                </div>
                <div class="description">
                </div>
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h2>Top Headlines</h2>
            </div>
            <div class="topNews">
    
            </div>

        </div>
    </div>
    <div class="page2">
        <div class="news" id="sportsNews">
            <div class="title">
                <h2>Sports News</h2>
            </div>
            <div class="newsBox">
            </div>
        </div>
        <div class="news" id="businessNews">
            <div class="title">
                <h2>Business News</h2>
            </div>
            <div class="newsBox">
            </div>
        </div>
        <div class="news" id="techNews">
            <div class="title">
                <h2>Technology News</h2>
            </div>
            <div class="newsBox">
            </div>
        </div>
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


    


    <script src="./index.js"></script>

</body>
</html>