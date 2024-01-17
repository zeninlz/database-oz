<?php
include('db.php');

$connetie = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $connetie->editUser($_POST['name'], $_POST['password'], $_GET['id']);
        header("Location: home.php?Success");

    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
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
    <form method="POST">
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>