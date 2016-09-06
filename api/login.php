<?php
	require_once '../core/init.php';

	header('Content-Type: application/json');

	$email = $_GET['email'];
	$password = $_GET['password'];
	$login_json = array();

	//check if user exists
	$query = "SELECT email, password FROM users WHERE email = '$email'";
	$check_query = $db->query($query);
	$row = mysqli_fetch_assoc($check_query);

	if(empty($row['email']) || !password_verify($password, $row['password']))
	{
		$login_json[] = array('loginResult' => 'false', 'userEmail' => $email);
		echo json_encode(array('login' => $login_json));
	}else
	{
		$login_json[] = array('loginResult' => 'true', 'userEmail' => $email);
		echo json_encode(array('login' => $login_json));
	}

?>
