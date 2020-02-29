<?php
include("login_validate.php");
include("register.php");
?>
<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/loginanimation.js"></script>
    <script src="js/checkpasswordmatch.js"></script>
    <script>
        function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

function funct(){
$(document).ready(function() {
    sleep(200).then(() => {
    $('.login-reg-panel input[type="radio"]').trigger("click");
    });
});
} 
    </script>

</head>
<body>
<?php
$activemenu="login";
include('menu.php');

?>
        <div class="login-reg-panel">
                <div class="login-info-box">
                    <h2>Already have an account?</h2>
                    <label id="label-register" for="log-reg-show">Login</label>
                    <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
                </div>
                                    
                <div class="register-info-box">
                    <h2>Don't have an account?</h2>
                    <label id="label-login" for="log-login-show">Register</label>
                    <input type="radio" name="active-log-panel" id="log-login-show">
                </div>
                                    
                <div class="white-panel" >

                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="login-show">
                            <h2>LOGIN</h2>
                            <input type="text" placeholder="Email" name="login_email" value="<?php if($emailerr=="") echo $login_email;?>" maxlength="75">
                            <input type="password" placeholder="Password" name="login_password" maxlength="30">
                            <input type="submit"  value="Login">
                            <a href="">Forgot password?</a><br>
                            <span class="error"> <?php echo $emailerr . $passworderr . $Msg;?></span>
                        </div>
                    </form>

                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="register-show">
                            <h2>REGISTER</h2>
                            <input type="text" placeholder="Username" name="reg_username" maxlength="40">
                            <input type="text" placeholder="Email" name="reg_email" maxlength="75">
                            <input type="password" placeholder="Password" name="reg_pass"id="reg_pass" maxlength="30" onkeyup='check();'>
                            <input type="password" placeholder="Confirm Password" name="reg_pass_confirm" id="reg_pass_confirm" maxlength="30" onkeyup='check();'>
                            <br><p>Date Of Birth :</p>
                            <input type="date" placeholder="Date Of Birth" name="reg_user_dob">
                            <br><span id='password_match_msg'></span>
                            <input type="submit" value="Register"><br>
                            <span class="error"> <?php echo $MsgErr;?></span>
                        </div>
                    </form>
                </div>
        </div>
        
    


    <script>loginanim();</script>
    <?php if(isset($_POST['reg_email'])){
    echo "<script> funct(); </script>";
} ?>
</body>

</html>