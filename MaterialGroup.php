<?php

    require 'connect.php';
    $database =  new connect();


    
    /*
     * GET RESULTS  
     */
     function materialValidationResult($query){
        $materialQueryresult = mysql_query($query);
        $row = mysql_fetch_array($materialQueryresult);
        return $row;
    }
     
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
                                                                }
                                                                
                                                        }else{
                                                            if($row['capitals'] == '1'){
                                                                    return '[A-Z]{'.$min.','.$max.'}';
                                                                }else if($row['digits'] == '1'){
                                                                    return '[0-9]{'.$min.','.$max.'}';
                                                                }else if($row['capdigit'] == '1'){
                                                                    return '[A-Z0-9]{'.$min.','.$max.'}';
                                                                }
                                                        }
                                                    }
     
     
    $materialValidation = materialValidationResult("SELECT  * FROM validations WHERE feildname='materialgroup'");
    
    
   $materialDescription = materialValidationResult("SELECT * FROM validations WHERE feildname='materialGroupDescription'");
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
                                                    // material group
                                                    $groupMax =  $materialValidation['maxlen'];
                                                    $groupMin = $materialValidation['minlen'];
                                                    $pattern =  patternMatching($groupMax, $groupMin, $materialValidation);
                                                    
                                                    // material description
                                                    $groupDescMax =  $materialDescription['maxlen'];
                                                    $groupDescMin =  $materialDescription['minlen'];
                                                    $groupDesPattern =  patternMatching($groupDescMax, $groupDescMin, $materialDescription);
                                                    
?>

/*
 * 
 * Material Group Auto  fields add
 */

function materialgroupname(j)
{
    if (j <= document.getElementById("materialgroup").rows.length) {
        for (var i= document.getElementById("materialgroup").rows.length; i>j ;i--) {
            var elName = "addRow[" + i + "]";
            var newName = "addRow[" + (i+1) + "]";
            var newClick = "materialgroupname(" + (i+1) + ")";
            var modEl = document.getElementsByName(elName);

            modEl.setAttribute("onclick", newClick);
            document.getElementsByName("addRow[" + i + "]").setAttribute('name', "addRow[" + (i+1) + "]");
        }
    }
    
    var table=document.getElementById("materialgroup");
    var row=table.insertRow(j);
    var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
     var i = "<form method='post' action='MaterialGroupBack.php'><td><center><input type = 'text' Maxlength='<?php echo $groupMax; ?>' required pattern='<?php echo $pattern;?>' minlength='<?php echo $groupMin;?>' name='MaterialGroup1' id='MaterialGroup1' value='' onkeyup='expand(this);' class='form-control input-md'></center></td><td><center><input type = 'text' name='MaterialGroupDescription1' minlength='<?php echo $groupDescMin;?>' maxlength='<?php echo $groupDescMax; ?>'  pattern='<?php echo $groupDesPattern; ?>'  id='MaterialGroupDescription1' value='' onkeyup='expand(this);' class='form-control input-md'></center></td><td><center><button type='submit' name='login-submit' id='login-submit'  class='btn btn-default'>Submit</button><input type='button' name='addRow["+ j + "]' class='add' onclick=\"materialgroupname(" + (j+1) + ")\" value='+' /></center></td></form>";   
    row.innerHTML=i;
   
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
input {
    box-sizing: border-box;
    width: 6em;
}
</style>
  </head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
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
        <li><a href="#" style="font-size:22px;">SCM Tools</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</div>
</nav>

<?php 
        $addCounter = 1;
       if(isset($_GET['addRow'])){
           $increment =  intval($_GET['increment']);
           $addCounter = $increment+1;
       }

?>
<div main="" style="margin-top:100px;">
<div class="container">
                
                            <div class="col-md-8 table-responsive">
                                       <center><h4>Material Group</h4></center> 
                                <table class="table table-striped"  id="materialgroup">
                                     <thead>
                                        <tr>
                                            <td>
                                            Material Group
                                            </td>
                                            <td>
                                            Material Group Description  
                                            </td>
                                            <td>
                                            &nbsp;
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                                $materialGroupData =  $database->getRowsDatabase("SELECT * FROM materialgroup");
                                            for($i=1; $i<= $addCounter; $i++){?>
                                                <tr>
                                                    <form method="post" action="MaterialGroupBack.php">
                                                        <td>
                                                            
                                                            <center><input type = "text" Maxlength="<?php echo $groupMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $groupMin;?>" name="MaterialGroup" id="MaterialGroup1" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                                        </td>
                                                        <td>
                                                            <center><input type = "text" name="MaterialGroupDescription" minlength="<?php echo $groupDescMin;?>" maxlength="<?php echo $groupDescMax; ?>"  pattern="<?php echo $groupDesPattern; ?>"  id="MaterialGroupDescription1" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                                        </td>
                                                        <td>
                                                        <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
                                                            
                                                        </td>
                                                    </form>
                                                    
                                                    <form action="MaterialGroup.php" method="get">
                                                       
                                                        <input type="submit" name="addRow"  class="add" value='+' />
                                                    </form>
                                                    
                                                    </tr>
                                        
                                           <?php }
                                        
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