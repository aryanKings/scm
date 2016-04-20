<?php 

    require'connect.php';
    
    $database = new connect();
    
    
    $paymentTerms =  htmlspecialchars($_POST['PaymentTerms']);
    $payDesc =  htmlspecialchars($_POST['PaymentTermsDescription']);
    $payDay = htmlspecialchars($_POST['PaymentTermsDays']);

    $check  = $database->getRowsDatabase("SELECT * FROM paymentterms WHERE pt='$paymentTerms'");
    if($check != null){
        $ptid =  $check[0]['ptid'];
        $result =  $database->mysqlQuery("UPDATE paymentterms SET ptdescription='$payDesc' ,ptdays='$payDay' WHERE ptid='$ptid'");
    }else{
        $result = $database->mysqlQuery("INSERT INTO paymentterms(pt,ptdescription,ptdays)VALUES('$paymentTerms','$payDesc','$payDay')");
    }
    
    
    if($result){
        header("Location:PaymentTerms.php?msg1=success");
    }else{
        header("Location:PaymentTerms.php?msg=failed");
    }
?>