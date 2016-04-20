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
     
     
  
    
      $OutputTax=  $database->getRowsDatabase("SELECT  * FROM validations WHERE feildname='OutputTax'");

   $OutputTaxDescription= $database->getRowsDatabase("SELECT * FROM validations WHERE feildname='OutputTaxDescription'");
  $OutputTaxPercentage= $database->getRowsDatabase("SELECT * FROM validations WHERE feildname='OutputTaxPercentage'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCM Tools</title>
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

<?php 
                                                    // Output Tax
                                                    $OutputTaxMax =  $OutputTax[0]['maxlen'];
                                                    $OutputTaxMin = $OutputTax[0]['minlen'];
                                                    $pattern =  patternMatching($OutputTaxMax, $OutputTaxMin, $OutputTax[0]);
                                                    
                                                    // Payment Terms description
                                                    $OutputTaxDescriptionMax =  $OutputTaxDescription[0]['maxlen'];
                                                    $OutputTaxDescriptionMin =  $OutputTaxDescription[0]['minlen'];
                                                    $OutputTaxDescriptionPattern =  patternMatching($OutputTaxDescriptionMax, $OutputTaxDescriptionMin, $OutputTaxDescription[0]);
                                                    // Payment Terms Days
                                                    $OutputTaxPercentageMax =  $OutputTaxPercentage[0]['maxlen'];
                                                    $OutputTaxPercentageMin =  $OutputTaxPercentage[0]['minlen'];
                                                    $OutputTaxPercentagePattern =  patternMatching($OutputTaxPercentageMax, $OutputTaxPercentageMin, $OutputTaxPercentage[0]);
                                                    
?>


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
.form-control1 {
    display: block;
    width:auto;
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
      <a class="navbar-brand" href="index.php">SCM Tools</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control1" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><img style="width:16px;height:16px;" src="images/magnifier13.png"></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="logoname" >SCM Tools</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</div>
</nav>
<?php 
$OutputTaxNums =  $database->getRowsnums("SELECT * FROM outputtax");

if($OutputTaxNums == 0 or $orNums== -1){
    $addCounter = 1;
}else{
    $addCounter = $OutputTaxNums;
}
       
       if(isset($_GET['addRow'])){
           $increment =  intval($_GET['increment']);
           $addCounter = $increment+1;
       }

?>
<div main="" style="margin-top:100px;margin-bottom:100px;">
<div class="container">
                
                            <div class="col-md-8 table-responsive">
                                       <center><h4>Output Taxes</h4></center> 
                                <table class="table table-striped"  id="OutputTax">
                                     <thead>
                                        <tr>
                                            <td>
                                            Output Tax
                                            </td>
                                            <td>
                                         Output Tax Description
                                            </td>
 <td>
                                       Percentage
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
                                            $outputTaxData =  $database->getRowsDatabase("SELECT * FROM outputtax");
                                            for($i=0; $i< $addCounter; $i++){
                                                
                                                if(isset($outputTaxData[$i])){
                                                ?>
                                        <tr>
                                        <form method="post" action="OutputTaxBack.php">
                                            <td>
                                                
                                                <center><input type = "text" Maxlength="<?php echo $OutputTaxMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $OutputTaxMin;?>" name="OutputTax" id="OutputTax" value="<?php echo  $outputTaxData[$i][1];?>" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                                <center><input type = "text" name="OutputTaxDescription" required minlength="<?php echo $OutputTaxDescriptionMin;?>" maxlength="<?php echo $OutputTaxDescriptionMax; ?>"  pattern="<?php echo $OutputTaxDescriptionPattern; ?>"  id="OutputTaxDescription" value="<?php echo  $outputTaxData[$i][2];?>" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
 <td>
                                                <center><input type = "text" name="OutputTaxPercentage" required minlength="<?php echo $OutputTaxPercentageMin;?>" maxlength="<?php echo $OutputTaxPercentageMax; ?>"  pattern="<?php echo $OutputTaxPercentagePattern; ?>"  id="OutputTaxPercentage" value="<?php echo  $outputTaxData[$i][3];?>" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                            <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
                                                
                                          </form>
                                                        </td>
                                                        <?php 
                                        $showAdd = $addCounter -1;
                                        if($i == $showAdd){?>
                                                 <td>

                                                            <form action="OutputTax.php" method="get">
                                                        <input type="hidden" name="increment" value="<?php echo $addCounter;?>" />
                                                        <input type="submit" name="addRow"  class="add" value='+' />
                                                    </form> 
                                                </td>
                                                    
                                                 <?php }else{?> <td></td>  <?php } ?>

                                                    </tr>
                                        
                                           <?php  }else { ?>
                                               
                                               
                                                <tr>
                                                    <form method="post" action="OutputTaxBack.php">
                                                        <td>
                                                
                                                <center><input type = "text" Maxlength="<?php echo $OutputTaxMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $OutputTaxMin;?>" name="OutputTax" id="OutputTax" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                                <center><input type = "text" name="OutputTaxDescription" required minlength="<?php echo $OutputTaxDescriptionMin;?>" maxlength="<?php echo $OutputTaxDescriptionMax; ?>"  pattern="<?php echo $OutputTaxDescriptionPattern; ?>"  id="OutputTaxDescription" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
 <td>
                                                <center><input type = "text" name="OutputTaxPercentage" required minlength="<?php echo $OutputTaxPercentageMin;?>" maxlength="<?php echo $OutputTaxPercentageMax; ?>"  pattern="<?php echo $OutputTaxPercentagePattern; ?>"  id="OutputTaxPercentage" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                                        <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
  </form>
                                                        </td>
                                                   <?php 
                                        $showAdd = $addCounter -1;
                                        if($i == $showAdd){?>
                                                 <td>

                                                            <form action="OutputTax.php" method="get">
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