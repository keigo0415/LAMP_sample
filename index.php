<?php
$dsn = 'mysql:dbname=mysql;host=localhost;';
$user = 'yasu';
$password = 'yasu1333';
try {
    $dbh = new PDO($dsn, $user, $password);

    $sql="select * from user";
    $result=$dbh->query($sql);
    $dellist=$dbh->query($sql);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="containar-fluir">
            <div class="navbar-header">
                <a href="demo.html" class="navvar-brand">LAMP SAMPLE PAGE</a>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="containar">
            <h1 class="display-4">DM Manager</h1>
            <p class="lead">
                LAMP環境を構築し、DBを操作するアプリケーションです。</br>
                デザインはBootStrapを使用しています。
            </p>
        </div>
    </div>
    <div class="containar">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#tab1" class="nav-link active" data-toggle="tab">Select</a>
            </li>
            <li class="nav-item">
                <a href="#tab2" class="nav-link" data-toggle="tab">Insert</a>
            </li>
            <li class="nav-item">
                <a href="#tab3" class="nav-link" data-toggle="tab">Update</a>
            </li>
            <li class="nav-item">
                <a href="#tab4" class="nav-link" data-toggle="tab">Delete</a>
            </li>
        </ul>
    </div>

    

    <div class="tab-content">
        <div id="tab1" class="tab-pane active">
            <table class="table table-hover mt-2">

            
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $value){?>
                
                    <tr>
                        <th><?php echo "$value[id]"?></th>
                        <th><?php echo "$value[name]"?></th>
                        <th><?php echo "$value[age]"?></th>
                    </tr>
                <?php}?>
            </tbody>
            <tr>
                <th>2</th>
                <th>User</th>
                <th>30</th>
            </tr>
            <tr>
                <th>3</th>
                <th>User</th>
                <th>10</th>
            </tr>
        </table>
        </div>
        <div id="tab2" class="tab-pane">
            <form action="./insert.php" method="POST">
                    <div class="form-group">
                        <label for="id">id</label>
                        <input class="form-control" type="text" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="age">age</label>
                        <input class="form-control" type="text" name="age" id="age">
                    </div>
                    <button type="submit" class="btn btn-primary">Insert</button>
            </form>
        </div>
        <div id="tab3" class="tab-pane">
            <form action="./update.php" method="POST">
                    <div class="form-group">
                        <label for="id">id</label>
                        <input class="form-control" type="text" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="age">age</label>
                        <input class="form-control" type="text" name="age" id="age">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
            </form></div>
        <div id="tab4" class="tab-pane">
        <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $value){?>
                
                    <tr>
                        <th><?php echo "$value[id]"?></th>
                        <th><?php echo "$value[name]"?></th>
                        <th><?php echo "$value[age]"?></th>
                        <td>
                            <form action="./delete.php" method="$_GET">
                                <input type="text" class="d-none" name="id" value="<?php echo $value[id] ?>">
                                <button type="submit" 
                            </form>
                        </td>
                    </tr>
                <?php}?>
        
        
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>