<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json'); 
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);
  
  // Get ID
  $post->name = isset($_GET['name']) ? $_GET['name'] : die();

  // Get post
  $post->read_single_name();

  // Create array
  $post_arr = array(
    'user_id' => $post->user_id,
    'user_password' => $post->user_password,
    'user_name' => $post->user_name,
    'user_gender' => $post->user_gender,
    'user_email' => $post->user_email,
    'user_dob' => $post->user_dob,
    'user_phoneNo' => $post->user_phoneNo,
    'user_address' => $post->user_address,
    'address_city' => $post->address_city,
    'address_zip' => $post->address_zip,
    'address_state' => $post->address_state
  );

  // Make JSON
  print_r(json_encode($post_arr));