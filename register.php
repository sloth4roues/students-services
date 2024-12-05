<?php
session_start();

if (isset($_POST["register"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username == "") {
    echo "<script>alert('Please enter a valid username.'); window.location = './register.php';</script>";
  } elseif ($password == "") {
    echo "<script>alert('Please enter a valid password.'); window.location = './register.php';</script>";
  } else {
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <button name="register"></button>
</body>
</html>