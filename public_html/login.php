<?php 

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user WHERE username = '$name' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['name'] = $row['username'];
        header('location:index.php');
    }else{
        $error[] = 'Incorrect username or password!';
    };
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<style>
    #c{
        padding: 200px;
    }
    #font1{
        font-weight: bold; font-size: 40px; 
    }
    #font2{
        font-weight: bold; font-size: 20px; 
    }
    #input_box{
        width: 250px;
        height: 35px;
        padding: 10px;
        margin-top:10px;

    }
    #login_btn{
        width: 250px;
        height: 35px;
        /* padding: 10px; */
        margin-top:10px;
        font-weight: bold; font-size: 20px;
    }


    </style>
<body>
    <div id='c'>
        <div style="margin-bottom: 50px;">
            <p id='font1'>Login</p>
        </div>

        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span>'.$error.'</span>';
                };
            };
        ?>


        <div>
            <form action="" method="post" autocomplete='off'>
                <label id='font2' for="name">Username</label><br>
                <input id="input_box" type="text" name="name" required placeholder="Enter your username"><br><br>
                <label id='font2' for="password">Password</label><br>
                <input id= "input_box" type="password" name="password" required placeholder="Enter your password">
                <br>
                <br>

                <input id="login_btn" type="submit" name="submit" value="Login"><br><br>
                <p>Don't have an account? <a href="register.php">Register now!</a></p>
            </form>
        </div>

    </div>
</body>
</html>