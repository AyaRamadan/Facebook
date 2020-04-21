<?php

$errorArray=[];
//-Connect To DB
$connect=mysqli_connect("localhost:3307","root","","facebook");


 if($connect){
        //   echo" DB connected...........";

 if(isset($_POST['addComment'])){
           session_start();
          $commentBody=mysqli_escape_string($connect,$_POST['commentBody']);          
          $p_id=mysqli_escape_string($connect,$_POST['post_id']);
          $u_id=mysqli_escape_string($connect,$_POST['user_id']);
          echo $commentBody;
                $result= mysqli_query($connect,"insert into comments set
                
                commentBody='$commentBody',
                u_id='$u_id',
                p_id='$p_id'

                 ");
                 if($result){
       
                    header("Location:home.php");
                  }else{
                      echo "Error";
                  }
 }
        else if(isset($_POST['updateComment'])){
          $c_id=mysqli_escape_string($connect,$_POST['id']);
          $commentBody=mysqli_escape_string($connect,$_POST['content']);
          $user_id=mysqli_escape_string($connect,$_POST['user_id']);

        $result= mysqli_query($connect ,"
            update comments set
            commentBody='$commentBody'
                  
                      where c_id='$c_id';
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