<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
     background-image:url('p1.jpg');
    background-size: cover;
  }
  .cont1{
    margin-top: 200px;
    margin-left: 550px;
    width: 350px;
	height: 400px;
	box-shadow: 20px 20px 20px black;
	background-color: transparent;
	backdrop-filter: blur(30px);
	border-radius: 20px;
}
#cb,#ab{
    background-image: linear-gradient(to right, #EB5757 0%, #000000  51%, #EB5757  100%);
    margin: 10px;
    padding: 15px 45px;
    text-align: center;
    text-transform: uppercase;
    background-size: 200% auto;
    color: white;            
    box-shadow: 0 0 20px #eee;
    width: 200px;
    height:70px;
    border-radius: 10px;
  }

  #cb:hover,#ab:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
  }
  h1{
    color:white;
  }
  
 
</style>
</head>
<body>
<div class="cont1">
<h1><center>swathi grand</center></h1>
    <form action=" " method="POST">
    <br><center> <input type="submit" name="cashbtn" value="CASHIER" id="cb"></center><br><br>
    <center><input type="submit" name="adminbtn" value="ADMIN" id="ab"></center><br>
</form>

</div>
</body>
</html>
<?php
    if(isset($_POST['cashbtn']))
    {
        header("Location:login1.php");
    }
    if(isset($_POST['adminbtn']))
    {
        header("Location:login2.php");
    }
    ?>