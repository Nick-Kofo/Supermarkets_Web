<?php
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
  }

  //check if user exists
  $query = "SELECT COUNT(email) as count FROM users WHERE email = '$email'";
  $check_query = $db->query($query);
  $row = mysqli_fetch_assoc($check_query);

  if($row['count'] > 0)
  {
    ?>
    <h5 class="center align">User exists<h5>
    <?php
  }else {
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    //hash_password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Enter user to the database
    $query = "INSERT INTO users (email, password)
              VALUES ('$email','$password')";

    $register_query = $db->query($query);

    ?>
    <h5 class="center align">Registration successfull.</h5>
    <?php
  }


?>
