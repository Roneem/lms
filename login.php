<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "lms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Login validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    echo "<p>Login successful!</p>";
    // Redirect to a dashboard or any other page after successful login
  } else {
    echo "<p>Invalid username or password</p>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Login</title>
</head>

<body>
  <div class="login-box">
    <h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="username">Username</label>
      <input type="text" name="username" required placeholder="Enter your username">

      <label for="password">Password</label>
      <input type="password" name="password" required placeholder="Enter your password">

      <input type="submit" value="Login">
    </form>
  </div>
</body>

</html>
