
<!DOCTYPE html>
<html>
<head>
<title>FaceClone</title>
<style>
    #btn{
        display: inline;
        margin: 60px;
    }
</style>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">FaceClone</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">Home</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
  
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="home1.php">
          <div class="input-group">
            <input class="form-control" type="text" name="userName" placeholder="Enter user name."> 
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
            <input type="submit" class="btn btn-primary btn-lg" name="post" value="post">
          </div>
        </form><hr>

<?php
 if(isset($_POST['post'])){
unset($_POST['post']);
$posts=$_POST;
$myFile=fopen("postsFile.txt","a+");
foreach($posts as $key=>$value){

    fwrite($myFile,"".$value.",");
}
fwrite($myFile,"\n");
}
 $myFile=fopen("postsFile.txt","a+");
fseek($myFile,0);
 while(!feof($myFile)) {
      $line = fgets($myFile);
      $data=explode(",",$line);?>

<!-- ./post form -->

        <div>
         
           <!-- post -->
          <div class="panel panel-default">
            <div class="panel-body">
            <span><?php echo $data[0] ?> </span><br><br>
            <span><?php echo $data[1] ?> </span><br><br>
             
            </div>
            <div class="post-footer-option container row" >
                <ul class="list-unstyled">
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
                </ul>
            </div>
            <div class="panel-footer">
              <!-- <span>posted 2017-5-27 20:45:01 by nicholaskajoh</span>  -->
              <span class="pull-right" ><a class="text-danger" href="#">Delete</a></span>
              <span class="pull-right" style="margin-right: 10px;"><a class="text-danger" href="#" style="margin: 50px">Edit</a></span>
            </div>
            <div class="panel-body" style="border: 1px solid gray ; margin:50px;">
              
              <p>Hello people! This is my first FaceClone comment Hurray!!!</p>
              <span class="pull-right" ><a class="text-danger" href="#">Delete</a></span>
              <span class="pull-right" style="margin-right: 10px;"><a class="text-danger" href="#">Edit</a></span>
            </div>
          </div>
          <?php } ?>           
          <!-- ./post -->
        </div>
        <!-- ./feed -->
      </div>
    
    </div>
  </main>
  <!-- ./main -->

 
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
