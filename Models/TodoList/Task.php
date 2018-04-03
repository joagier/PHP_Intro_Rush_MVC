<?php 
include_once '../Db.php';
Class Task {

	public function __construct(){
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

}

?>