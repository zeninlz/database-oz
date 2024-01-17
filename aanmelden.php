<?php
include('db.php');


 try{
   $connetie = new Database(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $connetie->register($_POST['name'], $_POST['achternaam'], $_POST['geboortedatum'] , $_POST['email'], $_POST['wachtwoord']);
    header("Location:login.php?aangemaakt");
   } 
 } catch(\Exception $e){
       echo $e->getMessage();
 }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="naam">
    <input type="text" name="achternaam">
    <input type="date" name="geboortedatum">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>
</body>
</html>