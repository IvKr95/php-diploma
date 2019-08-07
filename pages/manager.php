<?php

require_once '../classes/Manager.php';
$obj = new Manager;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/manager_styles.css">
    <title>Manager Interface</title>
</head>
<body>
  <div>
    <header class="header">
      <nav class="nav">
        <ul class="menu">
          <li class="menu-item"><a class="menu-link" href="#">New</a></li>
          <li class="menu-item"><a class="menu-link" href="#">Resolved</a></li>
          <li class="menu-item"><a class="menu-link" href="#">Rejected</a></li>
          <li class="menu-item"><a class="menu-link" href="#">Done</a></li>
          <li class="menu-item">
            <form action="../classes/Manager.php" method="get">
              <button type="submit" name="create">Create new</button>
            </form>
          </li>
          <li class="menu-item"><a class="menu-link" href="#">Exit</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <?php
        //upload all the projects with the Manager class
        echo $obj->getProjects();
      ?>
    </main>
    <footer>
    </footer>
  </div>
</body>
</html>