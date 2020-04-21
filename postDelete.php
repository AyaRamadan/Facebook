<?php

if(isset($_GET['post_id'])){
    $connect=mysqli_connect("localhost:3307","root","","facebook");
    if($connect){
      $res= mysqli_query($connect,"delete from posts where post_id='{$_GET['post_id']}'");
if($res){
    header("Location:home.php");
}
    }else{
        echo "Error in delete";
    }


}

?>