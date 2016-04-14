
/* 
            Auto increment text field
*/
function expand(textbox) {
    if (!textbox.startW) { textbox.startW = textbox.offsetWidth; }
     
    var style = textbox.style;
    
    //Force complete recalculation of width
    //in case characters are deleted and not added:
    style.width = 0;
    
    //http://stackoverflow.com/a/9312727/1869660
    var desiredW = textbox.scrollWidth;
    //Optional padding to reduce "jerkyness" when typing:
    desiredW += textbox.offsetHeight;
    
    style.width = Math.max(desiredW, textbox.startW) + 'px';
    var value =  textbox.value
    textbox.value = value.toUpperCase;
   
}

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
    cell1.innerHTML = "<center><input type='text'  name='MaterialGroup1' onkeyup='expand(this);' id='MaterialGroup1'  class='form-control input-md'/></center>";
    cell2.innerHTML = "<center><input type='text'  name='MaterialGroupDescription1' onkeyup='expand(this);' id='MaterialGroupDescription1' class='form-control input-md'/></center>";
    cell3.innerHTML="<input type='button' name='addRow["+ j + "]' class='add' onclick=\"materialgroupname(" + (j+1) + ")\" value='+' />";
    
}



