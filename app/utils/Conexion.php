<?php
    class Conexion{	
		public function get_conexion(){
			$user = "root";
			$pass = "*Alexis10*";
			$host = "localhost";
            $db = "Evateacher";
            
			try {
				$connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
			} catch (Exception $e) {
				print_r($e);
				
			}
			return $connection;
		}
    }
?>