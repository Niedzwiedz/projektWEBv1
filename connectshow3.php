<?php
    try{
        require_once 'includes/pdo_connect.php';
        $sql = 'SELECT title, author, path, ts FROM news ORDER BY ts DESC';
        $result = $db->query($sql);
        $all = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
           $error = $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PDO: SELECT loop</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <h1>PDO loop SELECT</h1> 
            <?php 
            if (isset($error)) {
                echo "<p>Serror</p>";
            }
            ?>
            <div class="row">
                <?php foreach($all as $row): ?>
                <div class="col-sm-6" >
                    <div class="row">
                        <div class="col-sm-12"><?php echo '<h3>'.$row['title'].'</h3>' ?></div>
                        <div class="col-sm-6 small"><?php echo 'Autor:'. $row['author'] ?></div>
                        <div class="col-sm-6 small text-right"><?php echo $row['ts'] ?></div>
                        <div class="col-sm-12 "><?php $file=  file_get_contents($row['path'], NULL,NULL,0,120);echo '<h5>'.$file . '...' .'</>'; ?></div>      
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>