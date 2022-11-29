<?php 

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user WHERE username = '$name' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exist!';
    }else{
        if($pass != $cpass){
            $error[] = 'Password not matched!';

        }else{

            echo "$name";
            echo "$pass";
            $insert = "INSERT INTO user (username,email,password) VALUES ('$name', '$email', '$pass')";
            mysqli_query($conn, $insert);

            header('location:login.php');
        }
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
    <title>Register</title>
</head>
<style>
    #c{
        padding: 100px;
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
    #submit_btn{
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
            <p id='font1'>Register</p>
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
                
                <label id='font2' for="name">Email</label><br>
                <input id="input_box" type="email" name="email" required placeholder="Enter your email"><br><br>
                <label id='font2' for="name">Password</label><br>
                <input id="input_box" type="password" name="password" required placeholder="Enter your password"><br><br>
                <label id='font2' for="name">Confirm Password</label><br>
                <input id="input_box" type="password" name="cpassword" required placeholder="Confirm your password"><br><br>
                <!-- <label id='font2' for="name">Username</label><br> -->
                <input id="submit_btn" type="submit" name="submit" value="Register"><br><br>
                <p>Already have an account? <a href="login.php">Login now!</a></p>
            </form>
        </div>

    </div>
</body>
</html>