<?php

    require 'connect.php';
    $database =  new connect();
    
    
    $materialGroup =  htmlspecialchars($_POST['materialgroup']);
    $materialType = htmlspecialchars($_POST['materialtype']);
    $startingNumber =  htmlspecialchars($_POST['StartingNumber']);
    $interval =  htmlspecialchars($_POST['Interval']);
    $nextNumber = htmlspecialchars($_POST['NextNumber']);
    
    
    $query = "SELECT * FROM materialnumberrange WHERE matgroup='$materialGroup' AND mattype='$materialType'";
    $rows = $database->getRowsDatabase($query);
    if($rows != null){
        $mnrid = $rows['mnrid']; 
        $result = $database->mysqlQuery("UPDATE materialnumberrange SET startnumber='$startingNumber', intervals='$interval',nextnumber='$nextNumber' WHERE mnrid='$mnrid'");
    }else{
        $result =  $database->mysqlQuery("INSERT INTO materialnumberrange(matgroup,mattype,startnumber,intervals,nextnumber)VALUES('$materialGroup','$materialType','$startingNumber','$interval','$nextNumber')");
    }
    
    
    if($result){
        header("Location:MaterialNumberRange.php?msg1=success");
    }else{
        header("Location:MaterialNumberRange.php?msg2=failed");
    }

?>