<?php
include('db.php');

$connetie = new Database();

try{
    $connetie->optellen("mar@gmail.com","1234");
    echo"gelukt";

} catch  (PDOException $e)
{ 
    echo "error inserting' .".$e->getMessage();
}

?>