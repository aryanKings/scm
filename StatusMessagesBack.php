<?php 

        require'connect.php';
        $database =  new connect();
        
        
        $statusCode =  htmlspecialchars($_POST['StatusMessageCode']);
        $statuMessage =  htmlspecialchars($_POST['StatusMessage']);
        $statusDesc =  htmlspecialchars($_POST['StatusMessageDescription']);
        
        
        $check =  $database->getRowsDatabase("SELECT * FROM statusmessages WHERE statusmessagecode='$statusCode'");
        
        if($check != null){
            $smid = $check[0]['smid'];
            $result =  $database->mysqlQuery("UPDATE statusmessages SET statusmessage='$statuMessage' ,statusmessagedescription='$statusDesc' WHERE smid='$smid'");
        }else{
            $result =  $database->mysqlQuery("INSERT INTO statusmessages(statusmessagecode,statusmessage,statusmessagedescription)VALUES('$statusCode','$statuMessage','$statusDesc')");
        }
        
        
        if($result){
            header("Location:StatusMessages.php?msg1=success");
        }else{
            header("Location:StatusMessages.php?msg=failed");
        }

?>