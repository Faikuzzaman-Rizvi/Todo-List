<?php
session_start();
include '../config/database.php';

$todo_query = "SELECT * FROM tasks";
$tasks = mysqli_query($db,$todo_query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
        }

        input[type="text"] {
            width: 475px;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 50px;
            margin-left: 1px;
            margin-top: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }

        ul li {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul li button {
            background-color: #ff4444;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        ul li button:hover {
            background-color: #e63b3b;
        }
        .sucssess{
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>To-Do List</h2>
    <ul>
        <form action="todo_manage.php" method="POST" style="display:inline">
            
            <input type="text" name="task" placeholder="Enter a new task" >
            <?php if(isset($_SESSION['task_add'])): ?>
                <div class="sucssess" style="color: #4CAF50;"><?php echo $_SESSION["task_add"]; ?></div>
            <?php endif; unset($_SESSION['task_add']) ?>
            <button type="submit" name="add_task" >Add</button>

            <?php if(isset($_SESSION['task_delete'])): ?>
                <div class="sucssess" style="color:#e63b3b;"><?php echo $_SESSION["task_delete"]; ?></div>
            <?php endif; unset($_SESSION['task_delete']) ?>

            <?php 
            $num=1;
               foreach ($tasks as $task) :?>
             <li>
            <?= $num++ ?>
            <?= $task['task'] ?>
            <a href="todo_manage.php?deleteid=<?= $task['id'] ?>"><button type="button">Delete</button></a>
            </li>
            <?php endforeach; ?>
        
    </form>
    </ul>
</div>
</body>
</html>
