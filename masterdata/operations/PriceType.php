<?php

        $ptrow =  $database->getRowsDatabase("SELECT * FROM unitofmeasure");
        
       if($ptrow != null){
            for($pt=0; $pt < count($pt);$pt++){?>
                <option value="<?php echo $ptrow[$pt][1];?>"><?php echo $ptrow[$pt][1];?></option>
           <?php }//loop closed    
       }//if closed

?>