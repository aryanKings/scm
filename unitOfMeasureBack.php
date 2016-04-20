<?php

    
        require'connect.php';
        $database = new connect();
        
        $uomCode  = htmlspecialchars($_POST['UoMCode']);
        $uomDescription = htmlspecialchars($_POST['UoMDescription']);
        
        $checkQuery = "SELECT * FROM unitofmeasure WHERE uomcode='$uomCode'";
        
        $rows =  $database->getRowsDatabase($checkQuery);

        if($rows !=  null){
            $uomid =  $rows[0]['uomid'];
            $result =  $database->mysqlQuery("UPDATE unitofmeasure SET uomdesc='$uomDescription' WHERE uomid='$uomid'");
        }else{
            $result =  $database->mysqlQuery("INSERT INTO unitofmeasure(uomcode,uomdesc)VALUES('$uomCode','$uomDescription')");
        }
        
        
        
        if($result){
            header("Location:UnitOfMeasure.php?msg1=success");
        }else{
            header("Location:UnitOfMeasure.php?msg=failed");
        }
?>