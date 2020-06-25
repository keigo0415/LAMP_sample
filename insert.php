<?php
$dsn = 'mysql:dbname=mysql;host=localhost;';
$user = 'yasu';
$password = 'yasu1333';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PRO::ERRMODE_EXCEPTION);

    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];

    $sql="insert into user values(:id,:name,:age)";
    $stmt=$dbn->prepare($sql);
    $params=array(':id'=> $id,':name'=>$name,':age'=>$age);


    $stmt->execute($params);

    header('Location:index.php?fg=1');
} catch (PDOException $e) {
    //echo "接続失敗: " . $e->getMessage() . "\n";
    header('Location:index.php?fg=2?'. $e->getMessanger());
    exit();
}

?>
