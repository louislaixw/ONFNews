<?php
@include 'config.php';
session_start();

$comment = false;
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

$url_components = parse_url($url);

// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
// Display result

$hash_url = $params['url'];
$url = base64_decode($hash_url);

$select = "SELECT * FROM news_list WHERE id = '$hash_url'";
$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $like = $row['likes'];
        $dislike = $row['dislikes'];
        $comments = $row['comment'];
    }
}else{
    $insert = "INSERT INTO news_list (id, url) VALUES ('$hash_url','$url')";

    mysqli_query($conn, $insert);
    $like = 0;
    $dislike = 0;
    $comments = "";
}

if(isset($_SESSION['name'])){
    
    $name = $_SESSION['name'];
    $comment = true;
}
?>


<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
    <iframe id="frame" style="width: 100%;height: 600px;" title="description"></iframe>
    <div style="width: 100%">
    <div style="display: flex;
    flex-direction: column;">
    
    <?php 
    if($comment){

        echo '
        <div style="flex-direction: column; margin: 10px;">
        <span onclick="like()" style="margin: 15px;">
            <i id="like_icon" class="fa-regular fa-thumbs-up fa-2x"></i>
            <b id="like">'.$like.'</b>
        </span>
        <span onclick="dislike()" style="margin: 15px;">
            <i id="dislike_icon" class="fa-regular fa-thumbs-down fa-2x"></i>
            <b id="dislike">'.$dislike.'</b>
        </span>
        </div>
        <div style="margin: 15px;" id = "all_comments_box"> </div>
        <div style="margin: 15px;">
        <b id="name_box">'.$name.': </b>
            <input style="width: 150px; height: 25px;padding:5px;" id="comment_box" type="text" name="comments" placeholder="Comments......">
            <button style= "height: 25px; width:80px; margin-left:5px; background-color: black;
            color: white;
            border: 2px solid #FFFFFF; "onclick="submit()">Comment</button>
        </div>
        
        ';    
    }else{
        echo '
        <div style="flex-direction: column; margin: 10px;">
        <span style="margin: 15px;">
            <i id="like_icon" class="fa-regular fa-thumbs-up fa-2x"></i>
            <b id="like">'.$like.'</b>
        </span>
        
        <span style="margin: 15px;">
            <i id="dislike_icon" class="fa-regular fa-thumbs-down fa-2x"></i>
            <b id="dislike">'.$dislike.'</b>
        </span>
        </div>
        <div id = "all_comments_box"> </div>

        
        '; 
    }
    ?>
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


    <!-- <script src="./index.js"></script> -->
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const hash_url = urlParams.get('url');
        const all_comments_box = document.getElementById('all_comments_box');
        var all_comments = [];

        document.getElementById('frame').src = atob(hash_url);
        $.ajax({
            type: "GET",
            url: "api.php",
            data: {comments: hash_url},
            success: function(res){

                all_comments = JSON.parse(res);
                for(let i = 0; i<all_comments.length; i++){
                    all_comments_box.innerHTML += `<p> ${all_comments[i].name}: ${all_comments[i].comment}`;
                }

            }
        })
        function like(){
            document.getElementById('like_icon').className = "fa-solid fa-thumbs-up fa-2x";
            $.ajax({
                type : "POST",  //type of method
                url  : "api.php",  //your page
                data : { likes : hash_url },// passing the values
                success: function(res){  
                    console.log(res);
                    document.getElementById('like').innerHTML = res;
                }
            });
        }

        function dislike(){
            document.getElementById('dislike_icon').className = "fa-solid fa-thumbs-down fa-2x";
            $.ajax({
                type : "POST",  //type of method
                url  : "api.php",  //your page
                data : { dislikes : hash_url },// passing the values
                success: function(res){  
                    console.log(res);
                    document.getElementById('dislike').innerHTML = res;
                }
            });
        }

        function submit(){
            var comment = document.getElementById('comment_box').value;

            var name = document.getElementById('name_box').innerText;
            var obj = {
                name: name,
                comment: comment
            };

            all_comments.push(obj);
            console.log(all_comments);
            // console.log(JSON.stringify(obj));
            $.ajax({
                type : "POST",  //type of method
                url  : "api.php",  //your page
                data : { id:hash_url,comments : JSON.stringify(all_comments) },// passing the values
                success: function(res){  
                    location.reload();
                }
            });
        }

    </script>
    
</body>
</html>
