<?php
class Database {
    public $pdo;
    
    public function __construct($db= "users", $user= "root", $pass="", $host= "localhost"){
    
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
    public function insertUser($name, $password){
        $stmt = $this->pdo->prepare("insert into user (name, password) values (?, ?)");
        $stmt-> execute([$name, $password]);
    }
    

    public function slectUser(){
        $stmt = $this->pdo->query("SELECT *FROM user" );
        $result = $stmt->fetchAll();
        return $result;

    }
    public function slectOneUser($id){
        $stmt = $this->pdo->prepare("SELECT *FROM user Where id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
}

?> 