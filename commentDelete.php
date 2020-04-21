<?php

if(isset($_GET['c_id'])){
    $connect=mysqli_connect("localhost:3307","root","","facebook");
    if($connect){
      $res= mysqli_query($connect,"delete from comments where c_id='{$_GET['c_id']}'");
if($res){
    header("Location:home.php");
}
    }else{
        echo "Error in delete";
    }


}

?>