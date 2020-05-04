<?php 
include('../../global/server.php');

if ($stmt = $conn->prepare('SELECT user_id, user_name, password FROM user WHERE email = ? ')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['login_email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id,$username, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['login_password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['user_name'] = $username;
		$_SESSION['user_id'] = $id;
		echo 'Welcome ' . $_SESSION['user_name'] . '!';
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect email!';
}
$stmt->close();











?>