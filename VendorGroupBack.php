<?php

        require'connect.php';
        $database =  new connect();
        
        
       $vendorGroup =  htmlspecialchars($_POST['VendorGroup']);
       $vendorDescription = htmlspecialchars($_POST['VendorDescription']);
       
       
       $checkQuery = "SELECT * FROM vendorgroup WHERE vendorgroup='$vendorGroup'";
       $rows =  $database->getRowsDatabase($checkQuery);
       
       if($rows != null){
           $vgid =  $rows[0]['vgid'];
           $result =  $database->mysqlQuery("UPDATE vendorgroup SET vgdescription='$vendorDescription' WHERE vgid='$vgid'");
       }else{
           $result =  $database->mysqlQuery("INSERT vendorgroup(vendorgroup,vgdescription)VALUES('$vendorGroup','$vendorDescription')");
       }
       
       if($result){
           header("Location:VendorGroup.php?msg1=success");
       }else{
           header("Location:VendorGroup.php?msg=failed");
       }
       
?>