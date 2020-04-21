
<!DOCTYPE html>
<html>
<head>
<?php
session_start();
 $connect=mysqli_connect("localhost:3307","root","","facebook");
 if($connect){
   $result=  mysqli_query($connect,"select * from comments inner join user inner join posts on user.id=comments.u_id and comments.p_id=posts.post_id
   where c_id='{$_GET['c_id']}'");
if($result){
$postData=mysqli_fetch_assoc($result);


}
 }
?>
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
        <form method="post" action="commentController.php">
          <div class="input-group">
            <input class="form-control" type="text" name="userName" value="<?php  echo $postData['userName'] ?>" > 
            <input class="form-control" type="text" name="content" value="<?php echo $postData['commentBody']?>">
            <input type="hidden" name="id" value="<?php echo $postData['c_id']?>">
            <input type="submit" class="btn btn-primary btn-lg" name="updateComment" value="post">
          </div>
        </form><hr>
<!-- ./post form -->

        


             
            
          <!-- ./post -->
       
        <!-- ./feed -->
      </div>
    
    </div>
  </main>
  <!-- ./main -->

 
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>