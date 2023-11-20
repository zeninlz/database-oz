<?php
class Database {
    public $pdo;
    
    public function __construct($db= "user", $user= "root", $pass="", $host= "localhost"){
    
        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"connectie gemaakt";
        }
        catch (Exception $e){ { 
            echo"error: ". $e->getmessage(); 
        }

        }
    }       
    public function optellen($a, $b){
        $sql = "INSERT INTO student (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $a, 'password' => $b]);

    }
    
}

?> 