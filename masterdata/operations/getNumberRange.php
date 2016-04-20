<?php


    require 'connect.php';
    $database =  new connect();
    
    $groups =  htmlspecialchars($_POST['group']);
    $types = htmlspecialchars($_POST['typed']);
    
    
    
    $check  = $database->getRowsDatabase("SELECT * FROM materialnumberrange WHERE matgroup='$groups' AND mattype='$types'");
    
    if($check != null){
      echo $check[0][5];
    }else{
        echo "null";
    }
?>