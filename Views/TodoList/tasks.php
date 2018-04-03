<?php
include_once (dirname(__FILE__) . '/../../Controllers/TodoList/tasksController.php');
class Display {

	public function displayTasks(){
		$display = new TaskController;
		$tasksToDisplay = $display->CheckTasks();
		foreach ($tasksToDisplay as $key) {
			echo $key['title'];
			echo "<br/>";
			echo $key['description'];
			echo "<br/>";
		}
	}
}
?>
