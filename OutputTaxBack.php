<?php

    require'connect.php';
    $database =  new connect();
    
    
    $outputTax =  htmlspecialchars($_POST['OutputTax']);
    $outDesc =  htmlspecialchars($_POST['OutputTaxDescription']);
    $outPer = htmlspecialchars($_POST['OutputTaxPercentage']);
    
    
    $check =  $database->getRowsDatabase("SELECT * FROM outputtax WHERE outputtaxes='$outputTax'");
    
    
    if($check != null){
        $otid =  $check[0]['otid'];
        $result =  $database->mysqlQuery("UPDATE outputtax SET outputtaxdescription='$outDesc' , outputtaxpercentage='$outPer'");
    }else{
        $result =  $database->mysqlQuery("INSERT INTO outputtax(outputtaxes,outputtaxdescription,outputtaxpercentage)VALUES('$outputTax','$outDesc','$outPer')");
    }


        if($result){
            header("Location:OutputTax.php?msg1=success");
        }else{
            header("Location:OutputTax.php?msg=failed");
        }
        
?>