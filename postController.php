<?php

$errorArray=[];
//-Connect To DB
$connect=mysqli_connect("localhost:3307","root","","facebook");


 if($connect){
        //   echo" DB connected...........";

 if(isset($_POST['addpost'])){
   echo "hello";
           session_start();
          
          $content=mysqli_escape_string($connect,$_POST['content']);
          $user_id=$_SESSION['id'];
          
           $dir_to_upload="./images/facebook";
           $tmp_file_name=$_FILES["photo"]["tmp_name"];
           $pic_mame=$_FILES["photo"]["name"]; 
          if(!empty($pic_mame)){
            if( move_uploaded_file($tmp_file_name,$dir_to_upload."/".basename($pic_mame))){
           echo "Done ...";
           $path=$dir_to_upload."/".$pic_mame;

          }else{
              
             echo "Error in upload emp pic ....";
              exit;

           }
          }
          if(!empty($pic_mame) || !empty($content)){
            $result= mysqli_query($connect,"insert into posts set
                
                content='$content',
                user_id='$user_id',
                photo='$path'
                
                 
                 ");
                 if($result){
       
                    header("Location:home.php");
                  }else{
                      echo "Error";
                  }
                }else{
                  header("Location:home.php");
                }
 }

else if(isset($_POST['updatepost'])){
    $post_id=mysqli_escape_string($connect,$_POST['id']);
    $content=mysqli_escape_string($connect,$_POST['content']);
    $user_id=mysqli_escape_string($connect,$_POST['user_id']);

  $result= mysqli_query($connect ,"
       update posts set
                content='$content'
            
                where post_id='$post_id';
   ");

  
   if($result){
    header("Location:home.php");
  }else{
    echo "Error";
   }
}
}
else{
  echo" connection failed...........";
}
?>