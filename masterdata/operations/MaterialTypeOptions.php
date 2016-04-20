<?php

        $typrow =  $database->getRowsDatabase("SELECT * FROM materialtype");
        
       if($typrow != null){
            for($typ=0; $typ < count($typrow);$typ++){?>
                <option value="<?php echo $typrow[$typ][1];?>"><?php echo $typrow[$typ][1];?></option>
           <?php }//loop closed    
       }//if closed

?>