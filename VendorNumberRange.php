<?php

    require 'connect.php';
    $database =  new connect();


     
     /*
      * PATTERN MATCHING 
      */
     function patternMatching($max,$min, $row){
                                                        if($max == $min){
                                                                
                                                                if($row['capitals'] == '1'){
                                                                    return '[A-Z]{'.$min.'}';
                                                                }else if($row['digits'] == '1'){
                                                                    return '[0-9]{'.$min.'}';
                                                                }else if($row['capdigit'] == '1'){
                                                                    return '[A-Z0-9]{'.$min.'}';
                                                                }else if($row['dotdigits'] == '1'){
                                                                    return '[0-9\.]{'.$min.'}';
                                                                }
                                                                
                                                        }else{
                                                            if($row['capitals'] == '1'){
                                                                    return '[A-Z]{'.$min.','.$max.'}';
                                                                }else if($row['digits'] == '1'){
                                                                    return '[0-9]{'.$min.','.$max.'}';
                                                                }else if($row['capdigit'] == '1'){
                                                                    return '[A-Z0-9]{'.$min.','.$max.'}';
                                                                }else if($row['dotdigits'] == '1'){
                                                                    return '[0-9\.]{'.$min.','.$max.'}';
                                                                }
                                                        }
                                                    }
     
     
  
    
      $VNRStartingNumber =  $database->getRowsDatabase("SELECT  * FROM validations WHERE feildname='VNRStartingNumber'");

   $VNRInterval= $database->getRowsDatabase("SELECT * FROM validations WHERE feildname='VNRInterval'");
  $VNRNextNumber= $database->getRowsDatabase("SELECT * FROM validations WHERE feildname='VNRNextNumber'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vendor Number Range SCM Tools</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
      <link rel="stylesheet" type="text/css"  href="css/page1.css">
        <link rel="stylesheet" type="text/css"  href="css/scm.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/validations.js"></script>
<script>

                                               function nextNum(starting,intervals,finals){
                                                  
                                                   
                                                    var startNumber =  document.getElementById(starting).value;
                                                    var intervalNumber = document.getElementById(intervals).value;
                                                    
                                                    
                                                    /*
                                                    *   get zeros count
                                                    */
                                                    
                                                    var zeroCount = 0;
                                                    var zeros = "";
                                                    for(var i = 0; i < startNumber.length;i++){
                                                        if(startNumber.charAt(i) == "0"){
                                                          
                                                            zeroCount++;
                                                        }
                                                    }
                                                    
                                                    /*
                                                    * parse the string to int   
                                                    */
                                                    
                                                    var startNum = parseInt(startNumber);
                                                    var intervalNum = parseInt(intervalNumber);
                                                    
                                                    var finalAdd =  startNum+intervalNum;
                                                    var finalString =  finalAdd.toString();
                                                    var result = "";
                                                  
                                                        var getZerosCount =  startNumber.length - finalString.length;
                                                        
                                                        for(var j = 0;j <  getZerosCount;j++){
                                                            zeros += "0";
                                                        }
                                                        
                                                        result = zeros+finalString;
                                                    
                                                    
                                                    
                                                    document.getElementById(finals).value = result;
                                                }
                                                
                                                
                                                
                                                
                                                
   
                                           

   /* 
            Auto increment text field
*/
function expand(textbox) {
    if (!textbox.startW) { textbox.startW = textbox.offsetWidth; }
     
    var style = textbox.style;
    
    //Force complete recalculation of width
    //in case characters are deleted and not added:
    style.width = 0;
    

    var desiredW = textbox.scrollWidth;
    //Optional padding to reduce "jerkyness" when typing:
    desiredW += textbox.offsetHeight;
    
    style.width = Math.max(desiredW, textbox.startW) + 'px';
    
   
}



</script>
<style>
.form-control {
    display: block;
    width:50px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

</style>
  </head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">
    <!-- Brand and toggle get Typeed for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><img style="width:16px;height:16px;" src="images/magnifier13.png"></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" style="font-size:22px;">SCM Tools</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</div>
</nav>
<?php 
                                                    // Vendor Starting number
                                                    $VNRStartingNumberMax =  $VNRStartingNumber[0]['maxlen'];
                                                    $VNRStartingNumberMin = $VNRStartingNumber[0]['minlen'];
                                                    $pattern =  patternMatching($VNRStartingNumberMax, $VNRStartingNumberMin, $VNRStartingNumber[0]);
                                                    
                                                    // VNR Interval
                                                    $VNRIntervalMax =  $VNRInterval[0]['maxlen'];
                                                    $VNRIntervalMin =  $VNRInterval[0]['minlen'];
                                                    $VNRIntervalPattern =  patternMatching($VNRIntervalMax, $VNRIntervalMin, $VNRInterval[0]);
  //VNR NextNumber
                                                    $VNRNextNumberMax =  $VNRNextNumber[0]['maxlen'];
                                                    $VNRNextNumberMin =  $VNRNextNumber[0]['minlen'];
                                                    $VNRNextNumberPattern =  patternMatching($VNRNextNumberMax, $VNRNextNumberMin, $VNRNextNumber[0]);
                                                    
?>
<?php 
$VNRNums =  $database->getRowsnums("SELECT * FROM vendornumberrange");

if($VNRNums == 0 or $VNRNums== -1){
    $addCounter = 1;
}else{
    $addCounter = $VNRNums;
}
       
       if(isset($_GET['addRow'])){
           $increment =  intval($_GET['increment']);
           $addCounter = $increment+1;
       }
$groupRow =  $database->getRowsDatabase("SELECT * FROM vendorgroup");
?>
<div main="" style="margin-top:100px;">
<div class="container">
                
                            <div class="col-md-8 table-responsive">
                                       <center><h4>Vendor Number Range</h4></center> 
                                <table class="table table-striped"  id="VendorType">
                                     <thead>
                                        <tr>
                                            <td>
                                            Vendor Group
                                            </td>
                                             <td>
                                           Starting Number
                                            </td>
                                            <td>
                                          Interval
                                            </td>
                                            <td>
                                         Next Number
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
 <td>
                                            &nbsp;
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
  <?php 
                                            $VNRData =  $database->getRowsDatabase("SELECT * FROM vendornumberrange");
                                            for($i=0; $i< $addCounter; $i++){
                                                
                                                if(isset($VNRData[$i])){
                                                ?>
                                        <tr>
                                        <form method="post" action="VendorNumberRangeBack.php">
                                            <td>
                                                
                                                <select name="Vendorgroup" id="Vendorgroup" style="width:85px;" required class="form-control">
                                                    <option value="" disabled selected hidden>Select</option>
                                                        <?php 
                                                            if($groupRow != null){
                                                            for($gr=0;$gr< count($groupRow); $gr++){ ?>
                                                                <option <?php if($VNRData[$i][1] == $groupRow[$gr][1]){ echo 'selected';}?> value="<?php echo  $groupRow[$gr][1];?>"><?php echo  $groupRow[$gr][1];?></option>  
                                                       <?php }// loop close 
                                                           }//if close
                                                       ?>  
                                                </select>
                                            </td>
                                             
                                           <td>
                                             <center><input type = "text" Maxlength="<?php echo  $VNRStartingNumberMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $VNRStartingNumberMin;?>" name="StartingNumber" id="StartingNumber<?php echo $i; ?>" value="<?php echo $VNRData[$i][2]; ?>" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $VNRIntervalMax; ?>" required pattern="<?php echo $VNRIntervalPattern;?>" minlength="<?php echo $VNRIntervalMin;?>" name="Interval" id="Interval<?php echo $i; ?>" value="<?php echo $VNRData[$i][3]; ?>" onkeyup="expand(this);" class="form-control input-md" onfocusout="nextNum('StartingNumber<?php echo $i;?>','Interval<?php echo $i; ?>','NextNumber<?php echo $i;?>');"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $VNRNextNumberMax; ?>" required pattern="<?php echo $VNRNextNumberPattern;?>" minlength="<?php echo $VNRNextNumberMin;?>" name="NextNumber" id="NextNumber<?php echo $i; ?>" value="<?php echo $VNRData[$i][4]; ?>" onkeyup="expand(this);"  class="form-control input-md"></center>
                                            </td>
                                            <td>
                                            <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
                                               
  </form>
                                            </td>
                                      
                                            
   <?php 
                                        $showAdd = $addCounter -1;
                                        if($i == $showAdd){?>
                                      
                                        
                                          <td>

                                                            <form action="VendorNumberRange.php" method="get">
                                                        <input type="hidden" name="increment" value="<?php echo $addCounter;?>" />
                                                        <input type="submit" name="addRow"  class="add" value='+' />
                                                    </form> 
                                                </td>
                                                    
                                                 <?php }else{?> <td></td>  <?php } ?>

                                                    </tr>
                                        
                                           <?php  }else { ?>
                                               
                                               
                                                <tr>
                                                    <form method="post" action="VendorNumberRangeBack.php">
 <td>
                                                
                                                <select name="Vendorgroup" id="Vendorgroup" style="width:85px;" required class="form-control">
                                                    <option value="" disabled selected hidden>Select</option>
                                                        <?php 
                                                            if($groupRow != null){
                                                            for($gr=0;$gr< count($groupRow); $gr++){ ?>
                                                                <option  value="<?php echo  $groupRow[$gr][1];?>"><?php echo  $groupRow[$gr][1];?></option>  
                                                       <?php }// loop close 
                                                           }//if close
                                                       ?>  
                                                </select>
                                            </td>
                                        
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo  $VNRStartingNumberMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $VNRStartingNumberMin;?>" name="StartingNumber" id="StartingNumber<?php echo $i; ?>" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $VNRIntervalMax; ?>" required pattern="<?php echo $VNRIntervalPattern;?>" minlength="<?php echo $VNRIntervalMin;?>" name="Interval" id="Interval<?php echo $i; ?>" value="" onkeyup="expand(this);" class="form-control input-md" onfocusout="nextNum('StartingNumber<?php echo $i;?>','Interval<?php echo $i; ?>','NextNumber<?php echo $i;?>');"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $VNRNextNumberMax; ?>" required pattern="<?php echo $VNRNextNumberPattern;?>" minlength="<?php echo $VNRNextNumberMin;?>" name="NextNumber" id="NextNumber<?php echo $i; ?>" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                                        
                                                        <td>
                                                        <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
  </form>
                                                        </td>
                                                   <?php 
                                        $showAdd = $addCounter -1;
                                        if($i == $showAdd){?>
                                                 <td>

                                                            <form action="VendorNumberRange.php" method="get">
                                                        <input type="hidden" name="increment" value="<?php echo $addCounter;?>" />
                                                        <input type="submit" name="addRow"  class="add" value='+' />
                                                    </form> 
                                                </td>
                                            <?php }else{?> <td></td>  <?php } ?>                                                    
                                                   
                                                    
                                                    </tr>
                                               
                                    <?php
                                    
                                           }//else close
                                     }//loop close 
                                     
                                    ?>
                                    </tbody>
                                    </table>
                                    
                                </div>
            </div>
</div>  
    
<div class="navbar navbar-default navbar-fixed-bottom">
    
        <div class="col-md-11">
            <h4> Status</h4>
        </div>
        <div style="text-align:right;" class="col-md-1">
            <h4>Yodhaa</h4>
        </div>
    
</div>

</body>
</html>