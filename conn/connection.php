<?php
try{
$conn = new PDO('mysql:host=localhost; dbname=centroescolarbd', 'root', '');
} catch(PDOException $e){
   echo "Error: ". $e->getMessage();
   die();
}
?>