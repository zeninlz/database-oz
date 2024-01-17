<?php
include('db.php');

$connetie = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $connetie->insertUser($_POST['name'], $_POST['password']);
        echo "toevoeging gelukt"; 

    }catch (Exception $e ){
        echo $e->getMessage();
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="2">
    <tr>
        
        <th>name</th>
        <th>password</th>
        <th colspan"2">action</th>
    </tr>

    <tr>
        <?php 
        $users = $connetie->slectOneUser(16);?>
         <td><?php echo $users['id'];?></td>
        <td><?php echo $users['name'];?></td>
        <td><?php echo $users['password'];?></td>
    </tr>

    <tr>
        <?php 
        $users = $connetie->slectUser();
        foreach ($users as $user) {?>
        <td><?php echo $user['name'];?></td>
        <td><?php echo $user['password'];?></td>
    </tr> <?php } ?>
            
    <tr>
        <?php 
        $users = $connetie->slect();
        foreach ($users as $user) {?>
        <td><?php echo $user['name'];?></td>
        <td><?php echo $user['password'];?></td>
        <td><a href="edit.php?id<?php echo $user['name'];?><?php echo $user['password'];?>">edit</a></td>
        <td><a href="delete.php?id<?php echo $user['name'];?><?php echo $user['password'];?>">delete</a></td>
    </tr> <?php } ?>
</table>




    <form method="POST">
        <input type="text" name="name">
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>