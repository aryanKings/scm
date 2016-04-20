<?php

        require 'operations/connect.php';
        $database =  new connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Material Master data SCM Tools</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
      <link rel="stylesheet" type="text/css"  href="css/page1.css">
        <link rel="stylesheet" type="text/css"  href="css/scm.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/validations.js"></script>
<style>
table {
    border: 0px solid #000;
}
</style>
 <SCRIPT LANGUAGE="JavaScript">

     function updateRangeAndCode(){
         var groups = document.getElementById("MaterialGroup");
         var types = document.getElementById("MaterialType");
         var ranges = document.getElementById("NumberRange");
         var codes = document.getElementById("MaterialCode");
         
         var groupValue = groups.value;
         var typesValue = types.value;
         
         $.post("operations/getNumberRange.php",{group:groupValue,typed:typesValue},function(data){
             if(data != "null"){
                 ranges.value = data;
                 codes.value = groupValue+typesValue+data;
                 document.getElementById("submit").disabled =  false;
                 ranges.setAttribute("style","color:#555;border:1px solid #ccc;");
             }else{
                 ranges.value = "Please select valid material group and type";
                 codes.value = "";
                 document.getElementById("submit").disabled = true;
                 ranges.setAttribute("style","color:red;border:1px solid red;");
                 
             }
         });
         
     }
     
     
function validate(fileId)
{
var extensions = new Array("jpg","jpeg","gif","png","tiff");

/*
 Alternative way to create the array

var extensions = new Array();

extensions[1] = "jpg";
extensions[0] = "jpeg";
extensions[2] = "gif";
extensions[3] = "png";
extensions[4] = "tiff";
*/

var image_file = document.getElementById(fileId).value;

var image_length = image_file.length;
var pos = image_file.lastIndexOf('.') + 1;

var ext = image_file.substring(pos, image_length);

var final_ext = ext.toLowerCase();
var valid  = false;
for (i = 0; i < extensions.length; i++)
{
    if(extensions[i] == final_ext)
    {
        valid = true;
    }
}
if(!valid){
    document.getElementById("msgsphoto").innerHTML="You must upload an image file with one of the following extensions: "+ extensions.join(', ') +".";
}else{document.getElementById("msgsphoto").innerHTML="";}
}
function contact_number(j)
{
if(j<5){
    if (j <= document.getElementById("contactsno").rows.length) {
        for (var i= document.getElementById("contactsno").rows.length; i>j ;i--) {
            var elName = "addRow[" + i + "]";
            var newName = "addRow[" + (i+1) + "]";
            var newClick = "displayResult(" + (i+1) + ")";
            var modEl = document.getElementsByName(elName);

            modEl.setAttribute("onclick", newClick);
            document.getElementsByName("addRow[" + i + "]").setAttribute('name', "addRow[" + (i+1) + "]");
        }
    }
    var table=document.getElementById("contactsno");
    var row=table.insertRow(j);
    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
 var cell3=row.insertCell(2);
    cell1.innerHTML="<input id='browser"+j+"' name='browser"+j+"' onfocusout=\"validate('browser"+j+"')\" class='form-control' type='file'/>";
   
    cell2.innerHTML="<input type='button' name='addRow["+ j + "]' class='add' onclick=\"contact_number(" + (j+1) + ")\" value='+' />";
    cell3.innerHTML="<input type='button' value='x' onclick=\"delRow(this)\"/>";
    }
};
 function checkButton(){
   document.getElementById('browsers').style.display='inline'

}
 function checkButton1(){
   document.getElementById('browsers').style.display='none'

}
 function delRow(currElement) {
     var parentRowIndex = currElement.parentNode.parentNode.rowIndex;
     document.getElementById("contactsno").deleteRow(parentRowIndex);
}


 </SCRIPT>
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
        <li><a href="index.html" style="font-size:22px;">SCM Tools</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</div>
</nav>

<div main="" style="margin-bottom:100px;">
<div class="container">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Material Master Data</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="MaterialGroup">Material Group*</label>
  <div class="col-md-4">
    <select id="MaterialGroup" name="MaterialGroup" required class="form-control">
      <?php require_once'operations/MaterialGroupOptions.php';?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="MaterialType">Material Type*</label>
  <div class="col-md-4">
    <select id="MaterialType" name="MaterialType" onchange="updateRangeAndCode();" required class="form-control">
      <?php require_once'operations/MaterialTypeOptions.php';?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="NumberRange">Number Range</label>  
  <div class="col-md-4">
      
  <input id="NumberRange" name="NumberRange" readonly  type="text" required placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Material Code">MaterialCode</label>  
  <div class="col-md-4">
  <input id="MaterialCode" name="MaterialCode" readonly type="text" required placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="MaterialDescription">Material Description*</label>  
  <div class="col-md-4">
  <input id="MaterialDescription" name="MaterialDescription" type="text" required placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Reference">Reference</label>  
  <div class="col-md-4">
  <input id="Reference" name="Reference" type="text" placeholder="" required  class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="OriginCountry">Origin Country*</label>
  <div class="col-md-4">
    <select id="OriginCountry" name="OriginCountry" required class="form-control">
        <?php require_once'operations/OriginCountryOptions.php';?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="BasicMeasure">Basic Unit of Measure*</label>
  <div class="col-md-4">
    <select id="BasicMeasure" name="BasicMeasure" required class="form-control">
        <?php require_once'operations/UnitOfMeasure.php';?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="PriceType">Price Type*</label>
  <div class="col-md-4">
    <select id="PriceType" name="PriceType" required class="form-control">
        <?php require_once'operations/PriceType.php';?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="UnitPrice">Unit Price</label>  
  <div class="col-md-4">
  <input id="UnitPrice" name="UnitPrice" type="text" required  placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="AvailableStock">Available Stock (in UoM)</label>  
  <div class="col-md-4">
  <input id="AvailableStock" name="AvailableStock" required type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="LeadTime">Lead Time (in Days)*</label>  
  <div class="col-md-4">
  <input id="LeadTime" name="LeadTime" type="text" required placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
    <center> <p style="color:red" id="msgsphoto"></p></center>
                                         <label class="col-md-2 control-label" for="Images">Images*</label>

                                    
                                       

  <div class="col-md-4">
   <table border="0" id= "contactsno" name="contactsno">
                                                <tr>
                                                    <td><input id="browser0" name="browser0" onfocusout="validate('browser0')" class="form-control" type="file"></td>
                                                    <td><input type="button" name="addRow[0]" required onclick="contact_number(1)" class="add" value='+' /></td><td></td>
                                                </tr>
                    
                                            </table>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Supply">Supply</label>
  <div class="col-md-4">
    <select id="Supply" name="Supply" required class="form-control">
      <option value="1">Option one</option>
      <option value="2">Option two</option>
    </select>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-default">Submit</button>
  </div>
</div>
</fieldset>
</form>

        
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