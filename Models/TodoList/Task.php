<?php

include_once (dirname(__FILE__) . '/../Db.php');

class Task {
  public function __construct()
    {
        $connect = new DB();
        $GLOBALS['pdo'] = $connect->connectDB();
    }
  
public function get_tasks()
    {
        $prepared_pdo = $GLOBALS['pdo']->prepare("SELECT * FROM tasks");
        $prepared_pdo->execute();
        $AllTasks = $prepared_pdo->fetchAll(PDO::FETCH_ASSOC);
        return $AllTasks;
    }

    public function get_task($id){

        $prepared_pdo = $GLOBALS['pdo']->prepare("SELECT * FROM tasks WHERE(id = ?)");
        $prepared_pdo->execute(array($id));
        $AllTasks = $prepared_pdo->fetchAll(PDO::FETCH_ASSOC);
        return $AllTasks;

    }

    public function delete_task($id){

        $prepared_pdo = $GLOBALS['pdo']->prepare("DELETE FROM tasks WHERE(id = ?)");
        $prepared_pdo->execute(array($id));
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


