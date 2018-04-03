<?php

include_once ("../Db.php");


class Task {

    public function __construct()
    {
        $connect = new DB();
        $GLOBALS['pdo'] = $connect->connectDB();
    }

    public function post_task ($title, $description = null) {
        $prepare = $GLOBALS['pdo']->prepare('INSERT INTO tasks (title, description, creation_date, edition_date) VALUES (?, ?, ?, ?)');
        $prepare->execute(array($title, $description, date("Y-m-d"), date ("Y-m-d")));
    }

    public function put_task($id, $title = null, $description = null) {
        $prepare = $GLOBALS['pdo']->prepare('UPDATE tasks SET title = ?, description = ? WHERE ID = ?');
        $prepare->execute(array($title, $description, $id));
    }
}

$create = new Task();
//$create->post_task("test3", "description3");
$create->put_task(3, "test4", "description4");