<?php 

        require'connect.php';
        $database = new connect();
        
        $query = "SELECT * FROM materialgroup";
        $rows =  $database->getRowsnums($query);
        
        echo $rows;

        $arr =  $database->getResultDatabase($query);
        print_r($arr);
?>