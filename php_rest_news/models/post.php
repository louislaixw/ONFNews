<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'user';

    // Post Properties
    public $id;
    public $username;
    public $email;
    public $password;
  

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . '';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    
    


// Create Post
public function create() {
  // Create query
  $query = 'INSERT INTO ' . $this->table . ' SET 
      id = :id, 
      username = :username, 
      email = :email, 
      password = :password';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->id = htmlspecialchars(strip_tags($this->id));
  $this->username = htmlspecialchars(strip_tags($this->username));
  $this->email = htmlspecialchars(strip_tags($this->email));
  $this->password = htmlspecialchars(strip_tags($this->password));


  // Bind data
  $stmt->bindParam(':id', $this->id);
  $stmt->bindParam(':username', $this->username);
  $stmt->bindParam(':email', $this->email);
  $stmt->bindParam(':password', $this->password);

  // Execute query
  if($stmt->execute()) {
    return true;
}

// Print error if something goes wrong
printf("Error: %s.\n", $stmt->error);

return false;
}

    
    }
   
   