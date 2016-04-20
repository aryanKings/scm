<?php

    require 'connect.php';
    $database =  new connect();
    
    $countryCode =  htmlspecialchars($_POST['CountryCode']);
    $countryName =  htmlspecialchars($_POST['CountryName']);
    
    $countryCheck =  $database->getRowsDatabase("SELECT * FROM origincountry");
    
    if($countryCheck != null){
        $cid =  $countryCheck[0]['cid'];
        $result =  $database->mysqlQuery("UPDATE origincountry SET countryname='$countryName' WHERE cid='$cid'");
    }else{
        $result = $database->mysqlQuery("INSERT INTO origincountry(countrycode,countryname)VALUES('$countryCode','$countryName')");
    }
    
    
    if($result){
        header("Location:OriginCountry.php?msg1=Successfull");
    }else{
        header("Location:OriginCountry.php?msg=failed");
    }
?>