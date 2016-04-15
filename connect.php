<?php
    //class for connecting the databases
    class connect {
        private $host = 'localhost';
        private $username ='yodhaa_admin';
        private $password ='YBSwb#2015';
        private $database ='yodhaa_scm';
        
        
        //construtor
        function  __construct(){
            $conn = $this->databaseConnect();
            if(!empty($conn)){
                $this->selectDatabase($conn);
            }
            $connection = $conn;
        }   
        
        // database connect
        function  databaseConnect(){
            if(($connection = mysql_connect($this->host,$this->username,$this->password)) === false)die("could not connect database");
            return  $connection;
        }
        
        //select the database
        function selectDatabase($connection){
            if((mysql_select_db($this->database,$connection)) === false)die("could not select the database");
        }
        
        //inserts the database
        function mysqlQuery($query){
            $resultQuery = mysql_query($query);
            
            if($resultQuery == 1){
                return  true;
            }
            
            return false;
        }
        
      
        
        /*
         * checks the query and get results or null
         */
        function getRowsDatabase($query){
           
            $resultQuery =  mysql_query($query);
            
            
            if(mysql_num_rows($resultQuery) > 0){
                
                while ($row =  mysql_fetch_array($resultQuery)) {
                    $result[] = $row;
                }  
                return $result;
            }else{
                return null;
            }
        }
        
        
        /*
     * checks the query and return the no of rows else -1
     */
    function getRowsnums($query){
        $resultQuery =  mysql_query($query);
        
        
        if(mysql_num_rows($resultQuery) < 0){
            return -1;
        }else{
          
            
            return intval(mysql_num_rows($resultQuery));
        }
    }
    
        
        
    }
    
    

?>