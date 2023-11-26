<?php
session_start();
if(isset($_SESSION['username'])){
    header("location:profile.php");
}
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete User Registration & Login System Using PHP & Ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        #alert,
        #register-box,
        #forgot-box{
            display:none;
        }
    </style>
 </head>
 <body class="bg-dark">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert"> 
                <div class="alert alert-success">
                    <strong id="result">Hello Word! </strong>
                </div>
            </div>
        </div>
        
        <!--login form-->

        <div class="row">
    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
        <h2 class="text-center mt-2">Login</h2>
        <form action="" method="post" role="form" class="p-2" id="login-frm">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required minlength="3" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];}?>">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required minlength="6" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['username'])) { ?> checked <?php } ?>>
                    <label for="customCheck" class="custom-control-label">Remember Me</label>
                    <a href="#" id="forgot-btn" class="float-right">Forgot Password?</a>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="login" id="login" value="Login" class="btn btn-primary btn-block">
            </div>
            <div class="form-group">
                <p class="text-center">New user? <a href="#" id="register-btn">Register Here</a></p>
            </div>
        </form>
    </div>
</div>


        <!--registration form-->
        <div class="row">
    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
        <h2 class="text-center mt-2">Register</h2>
        <form action="" method="post" role="form" class="p-2" id="register-frm">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required minlength="3">
            </div>
            <div class="form-group">
                <input type="text" name="uname" class="form-control" placeholder="Username" required minlength="3">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required minlength="6">
            </div>
            <div class="form-group">
                <input type="password" name="cpass"  id="cpass" class="form-control" placeholder="Confirm Password" required minlength="6">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                    <label for="customCheck2" class="custom-control-label">I agree to the <a href="#">terms & conditions</a>.</label>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
            </div>
            <div class="form-group">
                <p class="text-center">Already Registered? <a href="#" id="login-btn">Login Here</a></p>
            </div>
        </form>
    </div>
</div>

        <!--forgot password-->

        <div class="row">
    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
        <h2 class="text-center mt-2">Reset Password</h2>
        <form action="" method="post" role="form" class="p-2" id="forgot-form">
            <div class="form-group">
                <small class="text-muted">
                    To reset your password, enter the email address, and we will send reset password instructions to your email.
                </small>
            </div>
            <div class="form-group">
                <input type="email" name="femail" class="form-control" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
                <input type="submit" name="forgot" id="forgot" value="Reset" class="btn btn-primary btn-block">
            </div>
            <div class="form-group text-center">
                <a href="#" id="back-btn">Back</a>
            </div>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $("#register-btn").click(function(){
            $("#register-box").show();
            $("#login-box").hide();
        });
        $("#login-btn").click(function(){
            $("#register-box").hide();
            $("#login-box").show();
        });
        $("#forgot-btn").click(function(){
            $("#login-box").hide();
            $("#forgot-box").show();
        });
        $("#back-btn").click(function(){
            $("#forgot-box").hide();
            $("#login-box").show();
        });
        $("#login-frm").validate();
        $("#register-frm").validate({
    rules:{
        cpass:{
            equalTo:"#pass" 
        }
    }
});
$("#forgot-frm").validate(); 
//sumbit from without page refresh
     $("#register").click(function(e){
    if(document.getElementById('register-frm').checkValidity()){
        e.preventDefault();
        $.ajax({
            url:'action.php',
            method:'post',
            data:$("#register-frm").serialize()+'&action=register',
            success:function(response){
                $("#alert").show();
                $("#result").html(response);
            }
        });
    }
    return true;
});    
        });
            $("#login").click(function(e){
            if(document.getElementById('login-frm').checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:'action.php',
                    method:'post',
                    data:$("login-frm").serialize()+'&action=login',
                    success:function(response){
                        if(response==="ok"){
                            window.location='profile.php';
                        }
                        else{
                            $("#alert").show();
                            $("#result").html(response);

                        }
                        
                    }
                });
            }
            return true;
        });

            $("#forgot").click(function(e){
            if(document.getElementById('forgot-frm').checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:'action.php',
                    method:'post',
                    data:$("forgot-frm").serialize()+'&action=forgot',
                    success:function(response){
                        $("#alert").show();
                        $("#result").html(response);
                    }
                });
            }
            return true;
        });
 
</script>
 </body>
 </html> 
