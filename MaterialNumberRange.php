
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Material Number Range SCM Tools</title>
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



/*
 * 
 * Material Type Auto  fields add
 */

function materialTypename(j)
{
    if (j <= document.getElementById("materialType").rows.length) {
        for (var i= document.getElementById("materialType").rows.length; i>j ;i--) {
            var elName = "addRow[" + i + "]";
            var newName = "addRow[" + (i+1) + "]";
            var newClick = "materialTypename(" + (i+1) + ")";
            var modEl = document.getElementsByName(elName);

            modEl.setAttribute("onclick", newClick);
            document.getElementsByName("addRow[" + i + "]").setAttribute('name', "addRow[" + (i+1) + "]");
        }
    }
    
    var table=document.getElementById("materialType");
    var row=table.insertRow(j);
    var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
     var i = "<form method='post' action='MaterialTypeBack.php'><td><center><input type = 'text' Maxlength='<?php echo $TypeMax; ?>' required pattern='<?php echo $pattern;?>' minlength='<?php echo $TypeMin;?>' name='MaterialType' id='MaterialType' value='' onkeyup='expand(this);' class='form-control input-md'></center></td><td><center><input type = 'text' name='MaterialTypeDescription1' minlength='<?php echo $TypeDescMin;?>' maxlength='<?php echo $TypeDescMax; ?>'  pattern='<?php echo $TypeDesPattern; ?>'  id='MaterialTypeDescription1' value='' onkeyup='expand(this);' class='form-control input-md'></center></td><td><center><button type='submit' name='login-submit' id='login-submit'  class='btn btn-default'>Submit</button><input type='button' name='addRow["+ j + "]' class='add' onclick=\"materialTypename(" + (j+1) + ")\" value='+' /></center></td></form>";   
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
<div main="" style="margin-top:100px;">
<div class="container">
                
                            <div class="col-md-8 table-responsive">
                                       <center><h4>Material Number Range</h4></center> 
                                <table class="table table-striped"  id="materialType">
                                     <thead>
                                        <tr>
                                            <td>
                                            Material Group
                                            </td>
                                            <td>
                                            Material Type 
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <form method="post" action="MaterialTypeBack.php">
                                            <td>
                                                
                                                <center><input type = "text" Maxlength="<?php echo $TypeMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $TypeMin;?>" name="MaterialGroup" id="MaterialGroup" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                                <center><input type = "text" Maxlength="<?php echo $TypeMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $TypeMin;?>" name="MaterialType" id="MaterialType" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $TypeMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $TypeMin;?>" name="StartingNumber" id="StartingNumber" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $TypeMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $TypeMin;?>" name="Interval" id="Interval" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                             <center><input type = "text" Maxlength="<?php echo $TypeMax; ?>" required pattern="<?php echo $pattern;?>" minlength="<?php echo $TypeMin;?>" name="NextNumber" id="NextNumber" value="" onkeyup="expand(this);" class="form-control input-md"></center>
                                            </td>
                                            <td>
                                            <button type="submit" name="login-submit" id="login-submit"  class="btn btn-default">Submit</button>
                                                <input type="button" name="addRow[1]" onclick="materialTypename(2)" class="add" value='+' />
                                            </td>
                                        </form>
                                        
                                        </tr>
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