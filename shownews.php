<?php
    try{
        $id=intval($_GET['id']);
        require_once 'includes/pdo_connect.php';
        $sql = "SELECT * FROM news WHERE news_id=$id";
        $result = $db->query($sql);
        $all = $result->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
           $error = $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>THEBLACKBOARD</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>THEBLACKBOARD</h1> 
            <?php 
            if (isset($error)) {
                echo "<p>Serror</p>";
            }
            ?>
            <div class="row">
                <div class='col-sm-12 text-center'>
                       <?php echo "<h2>".$all['title']."<h2>"; ?>
                </div>
                <div class='col-sm-12'>
                    <div class="col-sm-6 text-left">
                        <?php echo "<p>Author:".$all['author']."</p>"; ?>
                </div>
                <div class="col-sm-6 text-right">
                        <?php echo "<p>".$all['ts']."</p>"; ?>
                </div>
                </div>
                <div class='col-sm-12'>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                    <?php $file=  file_get_contents($all['path'], FILE_USE_INCLUDE_PATH);echo $file; ?> 
                </div>
                     <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </body>
</html>

