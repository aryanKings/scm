<?php

        $ocrow =  $database->getRowsDatabase("SELECT * FROM origincountry");
        
       if($ocrow != null){
            for($oc=0; $oc < count($typrow);$oc++){?>
                <option value="<?php echo $ocrow[$oc][1];?>"><?php echo $typrow[$oc][1];?></option>
           <?php }//loop closed    
       }//if closed

?>