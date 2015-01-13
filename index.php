<?php
session_start();
    try{
        require_once 'includes/pdo_connect.php';
  $sql = 'SELECT notes.*, bb_users.username FROM notes, bb_users WHERE notes.author = bb_users.user_id ORDER BY ts DESC';
        $result = $db->query($sql);
        $all = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
           $error = $e->getMessage();
    }
/*** begin the session ***/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>THEBLACKBOARD</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
          
    </head>
    <body>
      <div class="container shadow">
            <div class="row myheader">
                <div class="col-sm-6">
                    <h1>THEBLACKBOARD</h1>
                </div>
<?php
if(!isset($_SESSION['user_id']))
{
  
?>
                <div class="col-sm-6">
                    <div class="jumbotron text-right shadow">
                        <p class="text-left">You are currently not logged in...</p>
                    <div class="btn-group text-right">
                        <a href="adduser.php" class="btn btn-info btn-default">Register</a>
                        <a href="login.html" class="btn btn-primary btn-default">Login <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    </div>
                </div>
            </div>
            <?php 
            if (isset($error)) {
                echo "<p>Serror</p>";
            }
            ?>
            <div class="row">
                <?php foreach($all as $row): $id=$row['notes_id']; ?>
                <div class="col-md-6 mylink-list" >
                    <a href="shownews.php?id=<?php echo $id ?>"><div class="row">
                        <div class="col-sm-12"><?php echo '<h3>'.$row['title'].'</h3>' ?></div>
                        <div class="col-sm-6 small"><?php echo 'autor:'. $row['username'] ?></div>
                        <div class="col-sm-6 small text-right"><?php echo $row['ts'] ?></div>
                        <div class="col-md-12 "><?php $file=  file_get_contents($row['path'], null,null,0,120);echo '<h5>'.$file . '...' .'</h5>'; ?></div></a>      
                    </div>
                </div>
                <?php endforeach;
}
else
{
?>
                <div class="col-sm-6">
                    <div class="jumbotron text-right  shadow">
                    <div class="btn-group text-right">
                      <a href="addnews.php" class="btn btn-primary btn-default">add note <span class="glyphicon glyphicon-chevron-right"></span></a>
		       <a href="history.php" class="btn btn-info btn-default">history </span></a>
                        <a href="logout.php" class="btn btn-info btn-default">logout </span></a>
                    </div>
                    </div>
                </div>
            </div>
            <?php
	    $i=1;
            if (isset($error)) {
                echo "<p>serror</p>";
            }
            ?>
            <div class="row">
                <?php foreach($all as $row): $id=$row['notes_id'];?> 
                <div class="col-md-6 mylink-list" >
                    <a href="shownews.php?id=<?php echo $id ?>"><div class="row">
                        <div class="col-sm-12"><?php echo '<h3>'.$row['title'].'</h3>' ?></div>
                        <div class="col-sm-6 small"><?php echo 'Autor:'. $row['username'] ?></div>
                        <div class="col-sm-6 small text-right"><?php echo $row['ts'] ?></div>
                        <div class="col-md-12 "><?php $file=  file_get_contents($row['path'], NULL,NULL,0,120);echo '<h5>'.$file . '...' .'</>'; ?></div></a>      
                    </div>
                </div>
			
                <?php endforeach;
}
?>
          </div>
        </div>
	  
	  <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	  
	           <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	    <link href="style.css" rel="stylesheet" type="text/css">
	
    </body>
</html>
