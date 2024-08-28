<?php
session_start();
include '../config/database.php';

//Insert Query And Connect Database...
if (isset($_POST['add_task'])) {
    $task = $_POST['task'];

    if ($task) {
        $query = "INSERT INTO tasks (task) VALUES ('$task')";
        mysqli_query($db, $query);
        $_SESSION['task_add'] = "Task added successfully.";
        header('location: todo.php');
    } else {
        $_SESSION['task_add'] = "Task cannot be empty.";
        header('location: todo.php');
    }
}


// Delete Query from Database
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $delete_query = "DELETE FROM tasks WHERE id='$id'";
    mysqli_query($db, $delete_query);
    $_SESSION['task_delete'] = "Task deleted successfully.";
    header('Location: todo.php');
}


?>
