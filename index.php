<?php
$dsn = 'mysql:dbname=user;host=localhost;';
$user = 'yasu';
$password = 'yasu1333';
try {
    $dbh = new PDO($dsn, $user, $password);

    $sql="select * from user";
    $result=$dbh->query($sql);

    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP SAMPLE PAGE</title>
</head>
<body>
<div class="container">
    <?php foreach($result as $value){
        echo "<h1>$value[id] $value[name] $value[age] </h1>";
    }?>
</div>
</body>
</html>