<?php 
    
        require 'connect.php';
        $database =  new connect();
        
        
        $matGroup = htmlspecialchars($_POST['MaterialGroup']);
        $matDesc = htmlspecialchars($_POST['MaterialGroupDescription']);
        
        $groupExists =  $database->getRowsDatabase("SELECT * FROM materialgroup WHERE groupname='$matGroup'");        

        if($groupExists != null){
            
            $grpId =  $groupExists['gid'];
            $result = $database->mysqlQuery("UPDATE materialgroup SET  description='$matDesc' WHERE gid='$grpId'");
            
            
        }else{
            $result = $database->mysqlQuery("INSERT INTO materialgroup(groupname,description)VALUES('$matGroup','$matDesc')");
        }
        
        
        
        
        //SUCCESS OR FAIL
        if($result == 1){
            header("Location:MaterialGroup.php?msg=success");
        }else{
            header("Location:MaterialGroup.php?msg=fail");
        }
?>