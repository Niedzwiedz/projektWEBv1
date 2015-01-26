<?php

session_start();
if(!isset($_SESSION['user_id']))
{
    echo "You need to be logged in to do that. ):";
    
}
else
{
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
                <div class="row">
                    <div class="col-sm-6">
                        <h1>THEBLACKBOARD</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <h3>ADD NOTE:</h3>
                    </div>
                </div>
                 <form class="form-horizontal"  action="note_submit.php" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="title">Title:</label>
                      <div class="col-sm-10">
                        <input type="input" class="form-control" id="title" name="title" placeholder="Enter title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="content">Content:</label>
                      <div class="col-sm-10">
                         <textarea class="form-control" rows="12" id="content" name="content" ></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                      </div>
                    </div>
                  </form>
                
            </div>
        </body>
    </html>
    <?php
}