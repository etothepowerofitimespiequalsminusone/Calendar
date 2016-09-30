<?php

require_once 'base.html';
echo <<<_END
<script>>
function checkRegNum(regnum)
{
if(regnum.value == '')
{
O('info').innerHTML = '';
return;
}

params = "regnum=" + regnum.value;
request = new ajaxRequest();
request.open("POST","checkCar.php",true);
request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
request.setRequestHeader("Content-length",params.length);
request.setRequestHeader("Connection","close");

request.onreadystatechange = function()
{
if(this.readyState == 4)
    if(this.status == 200)
        if(this.responseText != null)
            O('info').innerHTML = this.responseText;
}
request.send(params);
}

function ajaxRequest()
{
try{var request = new XMLHttpRequest()}
catch(e1){
try{request = new ActiveXObject("Msxml2.XMLHTTP")}
catch(e2){
try{request = new ActiveXObject("Microsoft.XMLHTTP")}
catch(e3){
request = false;
}}}
return request;
}
</script>
<div class='main'><h3>Fill out the form to add car to the database</h3>
_END;

$error = $regnum = $type = $color = $date = "";
$showdate = date('Y-m-d');


if(isset($_POST['regnum']))
{
    $regnum = sanitizeStrings($_POST['regnum']);
    $type = sanitizeStrings($_POST['type']);
    $color = sanitizeStrings($_POST['color']);
    $date = sanitizeStrings($_POST['date']);
    
    if($regnum == "")
    $error = "car registration number is necessary<br><br>";
    else
    {
        $result = queryMysql("SELECT * FROM cars where regnum='$regnum'");
        if($result->num_rows)
            $error = "this car is already in this database<br><br>";
            else
            {
                queryMysql("insert into cars values('$regnum','$type','$color','$date','$showdate')");
                die("<h4>car added to database</h4><br><br>");
            }
    }
}

echo <<<_END
<div class="container">
  <form method='post' action='edit.php'>
    <div class="form-group">
      <label for="regnum">Registration number</label>
      <input type="text" maxlength="6" class="form-control" id="regnum" name='regnum' placeholder='ab1234' value='$regnum'>
    </div>
      <div class="form-group">
      <label for="type">Type of car</label>
      <input type="text" maxlength="20" class="form-control" id="type" name='type' placeholder='volvo,BMW,Audi...' value='$type'>
    </div>
      <div class="form-group">
      <label for="color">Color</label>
      <input type="text" maxlength="20" class="form-control" id="color" name='color' placeholder="type any color" value='$color'>
    </div>
    <div class="form-group">
      <label for="date">Date Seen</label>
      <input type="text" maxlength="20" class="form-control" id="date" name='date' placeholder="$showdate" value='$date'>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

_END;

?>
<!--<span class'fieldname'>&nbsp;</span>-->
</body></html>

<!--<form method='post' action='edit.php'>$error
        RegNum  <input type='text' maxlength='6' name='regnum' value='$regnum'><br>
        Type    <input type='text' maxlength='20' name='type' value='$type'><br>
        Color   <input type='text' maxlength='20' name='color' value='$color'><br>
        Date    <input type='text' maxlength='10' name='date' value='$date'><br>
        <input type='submit' value="Add">
        </form></div><br>-->