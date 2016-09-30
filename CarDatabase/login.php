<!DOCTYPE html>
<?php

    require_once 'base.html';
    echo "<div class='main'><h3>Enter your credentials</h3>";
    $error = $user = $password = "";
    
    if(isset($_POST['user']))
    {
        $user = sanitizeStrings($_POST['user']);
        $password = sanitizeStrings($_POST['pass']);
        
        if($user == "" || $password == "")
        {
            $error = "not all fields were entered<br>";         
        }
        else{
            $result = queryMysql("select user,pass from members where user ='$user' and pass = '$password'");
        
            if($result->num_rows == 0)
            {
                $error = " <span class='error'> username/password invalid</span><br><br>";
            }
            else{
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $password;
                /*echo "<script> window.location = 'index.php'</script>";*/
                echo "<script> window.location = 'browse.php?view=$user'</script>";
            }
        }  
    }
    echo <<<_END
 <div class="container">
    <form method='post' action='browse.php' id='loginform'>
        <div class="form-group">
        <label for="regnum">Username</label>
        <input type="text" maxlength="16" class="form-control" id="regnum" name='user' placeholder='crazystalker' value='$user'>
        </div>
        <div class="form-group">
            <label for="type">Password</label>
            <input type="password" maxlength="16" class="form-control" id="type" name='pass' placeholder='........' value='$password'>
        </div>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
 </div>
_END;
?>

<br>
<span class='fieldname'>&nbsp;</span>

</form><br></div>

</body></html>