<?php
session_start();
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["password"]);

    if(empty($name) || empty($email) || empty($pass)){
        $error = "All fields are required!";
    } else {
        $_SESSION["saved_name"] = $name;
        $_SESSION["saved_email"] = $email;
        $_SESSION["saved_pass"] = $pass;
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Create Account</h2>

    <form method="POST">
        <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <label for="name">Full Name</label>
        <input type="text" name="name" placeholder="Enter your name">

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Create a password">

        <button type="submit">Sign Up</button>
    </form>

    <p class="switch">Already have an account? <a href="login.php">Login</a></p>
    <a href="index.php">Home</a>
</div>

<br>
<h3><i>"You don't have to be great to start, but you have to start to be great"</i></h3>

</body>
</html>