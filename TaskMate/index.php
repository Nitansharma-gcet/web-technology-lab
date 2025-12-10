<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My To-Do List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>My To-Do List</h1>

    <?php if(isset($_SESSION["username"])): ?>
        <p style="font-weight:bold; font-size:18px;">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?> 👋</p>
    <?php endif; ?>

    <nav>
      <a href="about.html">About</a>
      <a href="index.php">Home</a>

      <?php if(isset($_SESSION["username"])): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
      <?php endif; ?>
    </nav>
</header>
<hr>

<main class="todo-container">
    <div class="add-task">
      <input type="text" placeholder="Add a new task...">
      <button>Add</button>
    </div>

    <ul>
      <li>
        <div class="task-left">
          <input type="checkbox" id="t1">
          <label for="t1">Finish homework</label>
        </div>
        <button class="delete">x</button>
      </li>

      <li>
        <div class="task-left">
          <input type="checkbox" id="t2">
          <label for="t2">Read a book</label>
        </div>
        <button class="delete">x</button>
      </li>
    </ul>
</main>

<footer>
  <p>Made casually • HTML, CSS & PHP</p>
</footer>

<br><br><br>
<h2><b>"Start where you are, use what you have, do whatever you can"</b></h2>

<script>
// Add new task
const addBtn = document.querySelector(".add-task button");
const input = document.querySelector(".add-task input");
const ul = document.querySelector("ul");

addBtn.addEventListener("click", () => {
    if(input.value.trim() === "") return;

    let li = document.createElement("li");
    li.innerHTML = `
        <div class="task-left">
            <input type="checkbox">
            <label>${input.value}</label>
        </div>
        <button class="delete">x</button>
    `;
    
    ul.appendChild(li);
    input.value = "";

    li.querySelector(".delete").addEventListener("click", () => li.remove());
});

// Delete default tasks
document.querySelectorAll(".delete").forEach(btn =>
    btn.addEventListener("click", () => btn.parentElement.remove())
);
</script>

</body>
</html>