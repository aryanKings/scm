<?php

    require'connect.php';
    $database =  new connect();
    
    $incoTerms =  htmlspecialchars($_POST['IncoTerms']);
    $incoDescription = htmlspecialchars($_POST['IncoTermsDescription']);
    
    
    $check =  $database->getRowsDatabase("SELECT * FROM incoterms WHERE incoterm='$incoTerms'");
    
    if($check !=  null){
        $itid =  $check[0]['itid'];
        $result =  $database->mysqlQuery("UPDATE incoterms SET itdescription='$incoDescription'");
    }else{
        $result =  $database->mysqlQuery("INSERT INTO incoterms(incoterm,itdescription)VALUES('$incoTerms','$incoDescription')");
    }

    if($result){
        header("Location:IncoTerms.php?msg1=success");
    }else{
        header("Location:IncoTerms.php?msg=fail");
    }

?>