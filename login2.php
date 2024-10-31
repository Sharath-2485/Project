<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
    font-family: sans-serif;
    background:linear-gradient(#141e30,#243b55);
}
html{
    height: 100%;
}
.loginbox{
   
    position:absolute;
    top:50%;
    left:50%;
    width:400px;
    padding:40px;
    transform: translate(-50%,-50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
}
.loginbox h2{
    margin:0 0 30px;
    padding:0;
    color:#fff;
    text-align: center;
}
#butt
{
    display: inline-block;
    padding: 10px 20px;
    color:#03e9f4;
    font-size: 16px;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px;
    text-transform: uppercase;
    text-decoration: none;
    position:relative;

}
label{

    top:-20px;
    left:0;
    color:#03e9f9;
    font-size: 12px;

}

#butt {
   background-image: linear-gradient(to right, #1A2980 0%, #26D0CE  51%, #1A2980  100%);
   margin: 10px;
   padding: 15px 45px;
   text-align: center;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;            
   box-shadow: 0 0 20px #eee;
   border-radius: 10px;
   display: block;
 }

 #butt:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }
</style>
    
</head>
<body style=" background-image:url('loginimg.jpg');
    height:100vh;
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;">

<div class="loginbox">
<h2>ADMIN LOGIN</h2>
<form method="post" action="">
<div class="userbox">
<label>username</label>&nbsp &nbsp<input type="text" name="usn"><br><br>
<label>password</label> &nbsp &nbsp<input type="password" name="pswd"><br><br>
</div>
<input type="submit" name="btn"  id="butt" value="login">
</form><a style="color:white;" href="front.php">BACK</a>
</div>
</body>
</html>
<?php
        
    if(isset($_POST['btn']))
    {
        $usn=trim($_POST['usn']);
        $pswd=trim($_POST['pswd']);
        $error=array();
        if(empty($usn))
        {
            $error[]="username cannot be empty";
    
        }
        if(empty($pswd))
        {
             $error[]="password cannot be empty";
    
        }
        if(empty($error))
        {
        $username="dilip";
        $password="avi";
        $name=$_POST['usn'];
        $pass=$_POST['pswd'];
        if($username==$name && $password==$pass)
        {
            header("Location:db2.php");
        }
        else
        {
            echo "<script>alert('Invalid username or passowrd');</script>";
            
        }
        }else{
            foreach($error as $er)
            {
                echo "<script>alert('$er');</script>";
    
            }
        }    
    }
        ?>