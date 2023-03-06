<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1>Register</h1>
	<form action="register.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>

		<button type="submit">Register</button>
	</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Validate and sanitize the input
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	// Insert the user's credentials into the database
	$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

	if (mysqli_query($conn, $sql)) {
		echo "Registration successful!";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}
?>
