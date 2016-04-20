<?php 

        require'connect.php';
        $database =  new connect();
        
        
        $inputTax = htmlspecialchars($_POST['InputTax']);
        $inputDesc =  htmlspecialchars($_POST['InputTaxDescription']);
        $inputPer =  htmlspecialchars($_POST['InputTaxPercentage']);
        
        
        $check =  $database->getRowsDatabase("SELECT * FROM inputtax WHERE inputtaxes='$inputTax'");
        
        
        if($check  != null){
            
            
                $itid =  $check[0]['itid'];
                $result = $database->mysqlQuery("UPDATE inputtax SET inputtaxdescription='$inputDesc',inputtaxpercentage='$inputPer' WHERE itid='$itid''");
        }else{
                $result =  $database->mysqlQuery("INSERT INTO inputtax(inputtaxes,inputtaxdescription,inputtaxpercentage)VALUES('$inputTax','$inputDesc','$inputPer')");
        }
        
        
        if($result){
            header("Location:InputTax.php?msg1=success");
        }else{
            header("Location:InputTax.php?msg=failed");
        }

?>