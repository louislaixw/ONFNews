<?php 

@include 'config.php';


if(isset($_POST["likes"])){

    $id = mysqli_real_escape_string($conn, $_POST['likes']);
    $select = "SELECT * from news_list WHERE id='$id'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $like = $row['likes'];
            $like = $like + 1;
        }
        $insert = "UPDATE news_list SET likes='$like' WHERE id='$id'";
        mysqli_query($conn, $insert);
        echo "$like";
    }
}

if(isset($_POST["dislikes"])){

    $id = mysqli_real_escape_string($conn, $_POST['dislikes']);
    $select = "SELECT * from news_list WHERE id='$id'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $dislike = $row['dislikes'];
            $dislike = $dislike + 1;
        }
        $insert = "UPDATE news_list SET dislikes='$dislike' WHERE id='$id'";
        mysqli_query($conn, $insert);
        echo "$dislike";
    }
                
    
}

if(isset($_GET["comments"])){
    $id = mysqli_real_escape_string($conn, $_GET['comments']);
    $select = "SELECT * from news_list WHERE id='$id'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $cmt = $row['comment'];
        }
        echo "$cmt";
        
    }
    // echo "$id";
}

if(isset($_POST["comments"])){

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);
    $select = "SELECT * from news_list WHERE id='$id'";
    $result = mysqli_query($conn, $select);
    // echo "comments here";

    if(mysqli_num_rows($result) > 0){
        // output data of each row

        $insert = "UPDATE news_list SET comment='$comments' WHERE id='$id'";
        mysqli_query($conn, $insert);
        echo "$comments";
    }
}
