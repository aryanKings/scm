<?php

         $grprow = $database->getRowsDatabase("SELECT * FROM materialgroup");
         
         if($grprow !=  null){
             for($grp = 0; $grp < count($grprow);$grp++){ ?>
                 
                    <option value="<?php echo $grprow[$grp][1];?>"><?php echo $grprow[$grp][1];?></option>
             <?php }
           
           }
?>