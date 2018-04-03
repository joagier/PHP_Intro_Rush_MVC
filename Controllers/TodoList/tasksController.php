<?php 

include_once (dirname(__FILE__) . '/../../Models/TodoList/Task.php');

class TaskController
{
    function check_format ($title, $description = null) {
        if (isset($title) && $title != "") {
            if ($description) {
                $description = $this->secure_input($description);
                $title = $this->secure_input($title);
                $task = new Task();
                $task->post_task($title, $description);
            } else {
                $title = $this->secure_input($title);
                $task = new Task();
                $task->post_task($title);
            }
        } else {
            echo "Please enter a title\n";
        }
    }

    function secure_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$check = new TaskController();
$check->check_format(" jopijo");