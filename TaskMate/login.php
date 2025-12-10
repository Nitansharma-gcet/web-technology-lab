<?php
session_start();
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $pass = $_POST["password"];

    if($email == $_SESSION["saved_email"] && $pass == $_SESSION["saved_pass"]){
        $_SESSION["username"] = $_SESSION["saved_name"];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Login</h2>

    <form method="POST">
        <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password">

        <button type="submit">Login</button>

        <p class="switch">Don’t have an account? <a href="signup.php">Sign Up</a></p>
    </form>

    <a href="index.php">Home</a>
</div>

<br><br>
<h3><i>"Dream big. Start small. Act now."</i></h3>

</body>
</html>