
<!DOCTYPE html>
<html>
<head>
<?php
 session_start();
 $connect=mysqli_connect("localhost:3307","root","","facebook");
    if($connect){
        $result=mysqli_query($connect,"select * from posts inner join user on posts.user_id=user.id ");
        
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
        <a class="navbar-brand" href="index.html"><?php
        
       
        if(isset($_SESSION['userName'])){
            echo "Welcome".$_SESSION['userName'];
        }else{
            header("Location:login.php");
        }

        ?></a>
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
        <form method="post" action="postController.php" enctype="multipart/form-data" >
          <div class="input-group">
            <input class="form-control" type="text" name="user_id" value="<?php echo $_SESSION['userName'] ?>"> 
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
            <div class="form-group">
                  <input type="file" class="form-control-file"  name="photo" id="exampleFormControlFile1">
            </div>
            <input type="submit" class="btn btn-primary btn-lg" name="addpost" value="post">
          </div>
        </form><hr>
<!-- ./post form -->

        <div>       
           <!-- post -->              
    <?php
    
        while($row=mysqli_fetch_assoc($result)  ) 
        {
          
     ?>
          <div class="panel panel-default">
            <div class="panel-body">
            <span> <img src="./images/facebook/3.jpg" style="width:50px; height:50px"> </span> 
            <span style="color:royalblue; font: 20px tahoma bold"> <?php echo "{$row['userName']}" ?> </span><br><br> 
            <span> <?php echo "{$row['content']}" ?> </span><br><br> 
            <?php if(!empty($row['photo'])){ ?>
               <img src="<?php echo $row['photo']?>" style="width: 200px; height:200px"/>
          <?php  } ?>
        
     
        </div>
            <div class="post-footer-option container row" >
                <ul class="list-unstyled">
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                    <li id="btn"><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
                </ul>
            </div>
            
            <?php if($_SESSION['id']==$row["user_id"]){?>
              <div class="panel-footer">
              <span class="pull-right" ><a class="text-danger" href='postDelete.php?post_id=<?php echo $row["post_id"] ?>'>Delete</a></span>
              <span class="pull-right" style="margin-right: 10px;"><a class="text-danger" href='postEdit.php?post_id=<?php echo $row["post_id"] ?>' style="margin: 50px">Edit</a></span>
            </div>
            <?php }?>
            <!-- comment -->
            <div class="panel-body"  style="margin:50px;">
             <?php  


              $com_result=mysqli_query($connect,"select * from comments inner join  user on user.id=comments.u_id
              where comments.p_id='{$row["post_id"]}' 
              ");
              while($com_row=mysqli_fetch_assoc($com_result)  ) 
               {
                   if($row['post_id']==$com_row['p_id'])
               {    
             ?>
             <div style="border: 1px solid lightgray ; margin:20px;">
            <span> <?php echo "{$com_row['userName']}" ?></span><br>
            <span> <?php echo "{$com_row['commentBody']}" ?> </span><br>
            <?php if($_SESSION['id']==$com_row["id"]){?>
            <span class="pull-right" ><a class="text-danger" href='commentDelete.php?c_id=<?php echo $com_row["c_id"] ?>'>Delete</a></span>
            <span class="pull-right" style="margin-right: 10px;"><a class="text-danger" href='commentEdit.php?c_id=<?php echo $com_row["c_id"] ?>' style="margin: 50px">Edit</a></span>
            <?php  }?>  
          </div>
             <?php } }?>  
             <form method="post" action="commentController.php">             
                  <div class="input-group">
                  <input type="hidden" name="post_id" value="<?php echo $row["post_id"]?>">          
                    <input class="form-control" type="text" name="userName" value="<?php echo $_SESSION['userName']?>"> 
                    <input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">                  
                    <input class="form-control" type="text" name="commentBody" placeholder="Make a comment...">
                    
                    <input type="submit" class="btn btn-primary btn-lg" name="addComment" value="add">
                  </div>
              </form><hr>
            </div>
             <!-- comment -->
            </div>               
        <?php } ?>  
        </div> 
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