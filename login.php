<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>     
        <link rel="stylesheet" href="style.css">
    </head>

    <style>
  body {
    background-image: url('image/s.jpg');
    background-size: 1400px 690px;
    background-repeat: no-repeat;
  }

  h1 {
    font-weight: 900;
    font-size: 70px;
    color:indigo;
    font-family: "Lucida Console", "Courier New", monospace;
  }

  .first {
    margin-left: 120px;
    margin-top: 80px;
  }

  .second {
    margin-left: 120px;
    margin-bottom: 40px;
    padding-top: 10px;
  }

  .btn {
    border-radius: 12px;
    padding: 8px 10px 8px 10px;
  }

  .btn-login {
    border-radius: 12px;
    padding: 8px 10px 8px 10px;
  }


</style>
    <body>

<?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>

<h1><center>DIGITAL LIBRARY</center></h1>

<!--<div class="">-->
<div class=""><h4><?php echo $msg?></h4></div>
            
        <div>
                    <section class="first">
                      <div>
                    <form action="login_server_page.php" method="get" class="first">
                        <div>
                        <h2>USER LOGIN</h2>
                            <input type="text" class="btn-login"  name="login_email" placeholder="Your Email *" value="" />
                        </div>
                    <br>
                        <div>
                            <input type="password" class="btn-login" name="login_pasword"  placeholder="Your Password *" value="" />
                        </div>
                    <br>
                        <div>
                            <input type="submit" class="btn" value="Login" />
                        </div>
                    </form>
                      </div>
                    </section>
              
                    
              
                    <section class="second">
                      <div>
                    <form action="loginadmin_server_page.php" method="get" class="second" >
                        <div class="">
                        <h2>ADMIN LOGIN</h2>
                            <input type="text" class="btn-login" name="login_email" placeholder="Your Email *" value="" />
                        </div>
                        <br>
                        <div class="">
                            <input type="password" class="btn-login" name="login_pasword"  placeholder="Your Password *" value="" />
                        </div>
                        <br>
                        <div class="">
                            <input type="submit" class="btn" value="Login" />
                        </div>
                    </form>
                    
                    </section>
</div>

    </body>
</html>