<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>

		<button type="submit">Login</button>
	</form>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Retrieve the user's credentials from the database
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query
