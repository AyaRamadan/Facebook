
<?php

$errorArray=[];
//-Connect To DB
$connect=mysqli_connect("localhost:3307","root","","facebook");
if($connect){
if(isset($_POST['register'])){


        //   echo" DB connected...........";

        if(!isset($_POST['fullName']) || empty($_POST['fullName'])){

          $errorArray[]="fullName";
      }
      
      if(!isset($_POST['userName']) || empty($_POST['userName'])){
      
          $errorArray[]="userName";
      }
      
      if(!isset($_POST['password']) || empty($_POST['password'])) {
      
          $errorArray[]="password";
      }
      
      if(!isset($_POST['gender']) || empty($_POST['gender'])){
      
          $errorArray[]="gender";
      }
      if(!isset($_POST['email']) || empty($_POST['email']) || !filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)){
      
          $errorArray[]="email";
      }
      if(count($errorArray)>0){

        header("Location:register.php?error=".implode(",",$errorArray));
            
    }else{


      $fullName=mysqli_escape_string($connect,$_POST['fullName']);
      $userName=mysqli_escape_string($connect,$_POST['userName']);
      $email=mysqli_escape_string($connect,$_POST['email']);
      $password=mysqli_escape_string($connect,$_POST['password']);
      $gender=mysqli_escape_string($connect,$_POST['gender']);
      
            $result= mysqli_query($connect,"insert into user set
            fullName='$fullName',
            userName='$userName',
             email='$email',
             gender='$gender',
             password='$password'
             ");
      
      if($result){
         
        header("Location:login.php");
      }else{
          echo "Error";
      }
  
  }

}
elseif(isset($_POST['login'])){
 $result=mysqli_query($connect , "select * from user where email='{$_POST['email']}'
  and password='{$_POST['password']}' ");  
    //$res=mysqli_fetch_row($result); 
    if(count($result)!=0){
          foreach($result as $row){
               session_start();
                $_SESSION['userName']=$row['userName'];
                $_SESSION['id']=$row['id'];
                 header("Location:home.php");
          }
   }else{
    header("Location:login.php");
   }

  

}

}else{
  echo" connection failed...........";
}
?>