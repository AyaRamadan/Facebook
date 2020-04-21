<?php
echo "<pre>";
    var_dump($_POST);
echo "<pre>"  ;  
if(isset($_POST["login"])){
    echo "welcome from Login Form";
}
else{
    echo "welcome from Registeration Form";
}
?>