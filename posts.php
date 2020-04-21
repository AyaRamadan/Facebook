<?php

echo "<pre>";
    var_dump($_POST);
echo "<pre>"  ; 
$posts=$_POST;
unset($_POST['post']);
$posts=$_POST;
foreach($posts as $key=>$value){
    $myFile=fopen("postsFile.txt","a+");
    fwrite($myFile,$value.",");
 
}

// if(isset($_POST["login"])){
//     echo "welcome from Login Form";
// }
// else{
//     echo "welcome from Registeration Form";
// }



$text = fgetcsv($myFile,999,',');




?>