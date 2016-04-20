<?php

        require'connect.php';
        $database =  new connect();
        
        
        $vendorGroup = htmlspecialchars($_POST['Vendorgroup']);
        $startingNumber = htmlspecialchars($_POST['StartingNumber']);
        $interval =  htmlspecialchars($_POST['Interval']);
        $nextNumber = htmlspecialchars($_POST['NextNumber']);
        
        
        $checkQuery = $database->getRowsDatabase("SELECT * FROM vendornumberrange WHERE vnrvendorgroup='$vendorGroup'");
        
        
        if($checkQuery != null){
            $vnrid = $checkQuery[0]['vnrid'];
            $result = $database->mysqlQuery("UPDATE vendornumberrange SET vnrstartnumber='$startingNumber',vnrinterval='$interval',vnrnextnumber='$nextNumber' WHERE  vnrid='$vnrid'");
        }else{
            $result =  $database->mysqlQuery("INSERT INTO vendornumberrange(vnrvendorgroup,vnrstartnumber,vnrinterval,vnrnextnumber)VALUES('$vendorGroup','$startingNumber','$interval','$nextNumber')");
        }
        
        
        
        if($result){
            header("Location:VendorNumberRange.php?msg1=success");
        }else{
            header("Location:VendorNumberRange.php?msg=failed");
        }

?>