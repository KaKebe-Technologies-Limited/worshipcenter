<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the username and password exist in the database
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

// If the username and password exist, log the user in
if ($stmt->rowCount() > 0) {
    // Get the user data from the database
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Create a session for the user
    session_start();
    $_SESSION['username'] = $user['username'];

    // Redirect the user to the index page
    header('Location: index.php');
} else {
    // Redirect the user to the login page
    header('Location: login.php');
}

?>

<html>
<head>
<title>Login</title>
</head>
<body>

<form action="login.php" method="post">

<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<input type="submit" value="Login">

</form>

</body>
</html>
