<?php
  require_once '../core/init.php';

  header('Content-Type: application/json');

  $email = $_GET['email'];
  $password = $_GET['password'];
  $register_json = array();

  
  //check if user exists
  $query = "SELECT COUNT(email) as count FROM users WHERE email = '$email'";
  $check_query = $db->query($query);
  $row = mysqli_fetch_assoc($check_query);

  if($row['count'] > 0 || $email == '' || $password == '')
  {
    $register_json[] = array('registerResult' => 'false', 'userEmail' => $email);
    echo json_encode(array('register' => $register_json));
  }else {
      $email = mysqli_real_escape_string($db, $email);
      $password = mysqli_real_escape_string($db, $password);
      //hash_password
      $password = password_hash($password, PASSWORD_DEFAULT);

      //Enter user to the database
      $query = "INSERT INTO users (email, password)
                VALUES ('$email','$password')";

      $register_query = $db->query($query);

      $register_json[] = array('registerResult' => 'true', 'userEmail' => $email);
      echo json_encode(array('register' => $register_json));
  }

?>