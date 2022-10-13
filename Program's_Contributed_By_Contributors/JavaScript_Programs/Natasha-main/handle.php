<?php
session_start();
#$row=json_decode()
$pdo= new PDO('mysql:host=localhost; port=3306; dbname=test', 'test', 'Asdf@1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#if(isset($_POST['submit']))
#{
if (strlen($_POST['name'])<1 || strlen($_POST['city'])<1 || strlen($_POST['occupation'])<1)
{
    $_SESSION['error']='All fields are required';
    header('Location: index.php');
    return;
}
else {
    $stmt=$pdo->prepare("INSERT INTO formdata (name, city, occupation) VALUES (:na, :ci, :oc)");
    $stmt->execute(array(
        ':na'=>htmlentities($_POST['name']),
        ':ci'=>htmlentities($_POST['city']),
        ':oc'=>htmlentities($_POST['occupation'])
    ));
}
#}
header('Content-Type: application/json');
$stmt=$pdo->query("SELECT name, city, occupation FROM formdata");
$rows=array();
while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$rows[]=$row;
}

echo json_encode($rows, JSON_PRETTY_PRINT);
?>