<?php

Class DB {

	public  static function connectDB()
	{
	    try {
	        $pdo = new PDO('mysql:dbname=todo_php;host=localhost', 'root', '');
	        return $pdo;
	    } catch (PDOException $e) {
	        echo "PDO ERROR: " . $e->getMessage() . "\n";
	    }
	}
}



?>