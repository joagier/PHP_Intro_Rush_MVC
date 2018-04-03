<?php

Class DB {

	public function connectDB()
	{
	    try {
	        $pdo = new PDO('mysql:dbname=todo_php;host=localhost', 'root', 'Echarcon91!');
	        return $pdo;
	    } catch (PDOException $e) {
	        echo "PDO ERROR: " . $e->getMessage() . "\n";
	    }
	}
}



?>