<?php

use PhpParser\Node\Stmt;

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
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt-> execute([$name, $password]);
    }
    

    public function slectUser(){
        $stmt = $this->pdo->query("SELECT *FROM user" );
        $result = $stmt->fetchAll();
        return $result;

    }
    public function slect( int $id = null ){
        if($id){
             $stmt = $this->pdo->prepare("SELECT *FROM user WHERE id = ?" );
             
             $stmt->execute([$id]);
            $result = $stmt->fetch();
            return $result;
        }
        $stmt = $this->pdo->query("SELECT * From user");
        $result = $stmt->fetchAll();
        return $result;

    }
    public function slectOneUser($id){
        $stmt = $this->pdo->prepare("SELECT *FROM user Where id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function editUser($name, $password, $id){
        $stmt = $this->pdo->prepare("UPDATE `user` SET `name` = ?, `password` = ? WHERE `id` = ?");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$name , $password, $id]);
    
    }
    public function deleteUser( int $id){
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE `id` = ?");
        $stmt->execute([ $id]);
    
    }


    public function register(string $name , string $achternaam , string $geboortedatum, string $email , string $password){
    $stmt = $this->pdo->prepare("INSERT INTO users (name ,achternaam, geboortedatum, email, wachtwoord) VALUES (?,?,?,?,?)");
        $stmt->execute([$name, $achternaam,$geboortedatum , $email , $password]);


    }

}

?> 