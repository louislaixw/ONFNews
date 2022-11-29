<?php 

@include 'config.php';


if(isset($_POST["save_news"]))
{
    $json = json_decode($_POST['save_news'],true);
    print$json;
    die;

    $query = "INSERT INTO `publisher` (`publisher_id`,  `publisher_name`, `publisher_date`, `publisher_city/country`) 
            VALUES (NULL, '".$name."','".$date."' , '".$city."')";
            
    if ($db->query($query)) {
        echo json_encode(array("data" =>"Insert publisher successfully", "status" => 1));
    }
    
    else {
        echo json_encode(array('status' => 0 , 'data' => $db->error));
    }
}

?>
