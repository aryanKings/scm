<?php


        require'connect.php';
        $database = new connect();
        

          $type =  htmlspecialchars($_POST['MaterialType']);
          $desc = htmlspecialchars($_POST['MaterialTypeDescription']);
          
          
          $checkResult =  $database->getRowsDatabase("SELECT * FROM materialtype WHERE typename='$type'");
          
          if($checkResult != null){
              $id = $checkResult[0]['tid'];
              $updateQuery = "UPDATE materialtype SET description='$desc' WHERE tid='$id'";
              $result = $database->mysqlQuery($updateQuery);
          }else{
              $insertQuery = "INSERT INTO materialtype(typename,description)VALUES('$type','$desc')";
              $result =  $database->mysqlQuery($insertQuery);
          }      
          
          
          
          if($result == true){
              header("Location:MaterialType.php?msg1=successfull");
          }else{
              header("Location:MaterialType.php?msg=unsuccessfull");
          }
        
?>
