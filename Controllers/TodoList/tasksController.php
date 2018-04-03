<?php 
include_once(dirname(__FILE__) . '/../../Models/TodoList/Task.php');

class TaskController {

	// Prend en paramètre un tableau asso xretourné par get_tasks() 
	public function CheckTasks(){
		$get = new Task();
		$tasks = $get->get_tasks();
		foreach ($tasks as $key => $task) {
			$tasks[$key]['title'] = htmlspecialchars($task['title']);
			$tasks[$key]['description'] = nl2br(htmlspecialchars($task['title']));
		}
		return $tasks;
	}

	// Check si array retourné par get_task($id) n'est pas vide ou NULL
	public function CheckTask($id){
		$get = new Task();
		$tasks = $get->get_task($id);

		if (empty($tasks)) {
			return false;
		} else {
			foreach ($tasks as $key => $task) {
				$tasks[$key]['title'] = htmlspecialchars($task['title']);
				$tasks[$key]['description'] = nl2br(htmlspecialchars($task['title']));
			}
			return $tasks;
		}
		
	}

}
?>