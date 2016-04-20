<?php

        $uomrow =  $database->getRowsDatabase("SELECT * FROM unitofmeasure");
        
       if($uomrow != null){
            for($uom=0; $uom < count($uom);$uom++){?>
                <option value="<?php echo $uomrow[$uom][1];?>"><?php echo $uomrow[$uom][1];?></option>
           <?php }//loop closed    
       }//if closed

?>