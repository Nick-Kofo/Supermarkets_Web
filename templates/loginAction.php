<?php
  if(!empty($_POST['email']) && !empty($_POST['password']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
  }

  //check if user exists
  $query = "SELECT email, password FROM users WHERE email = '$email'";
  $check_query = $db->query($query);
  $row = mysqli_fetch_assoc($check_query);

  if(empty($row['email']))
  {
    ?>
    <h5 class="center align">Wrong email.</h5>
    <?php
  }else
  {
    if(password_verify($password, $row['password']))
    {
      ?>
      <h5 class="center align">Login Succesfull.</h5>
      <?php
    }else{
      ?>
      <h5 class="center align">Wrong password.</h5>
      <?php
    }
  }

?>
