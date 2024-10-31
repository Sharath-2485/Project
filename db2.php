<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pre{
            display:none;
        }
        #prebills{
            color:blue;
            background:#eee;
            margin-top:100px;
        }
        button{
                background-image: linear-gradient(to right, #f46b45 0%, #eea849  51%, #f46b45  100%);
                margin: 10px;
                padding: 15px ;
                text-align:center;
                text-transform: uppercase;
                background-size: 200% auto;
                color: black;            
                box-shadow: 0 0 20px #000;
                border-radius: 10px;
                width: 130px;
                height: 40px;
                }

        button:hover {
                background-position: right center; /* change the direction of the change here */
                color: #eee;
                text-decoration: none;
        }
        #exit{
                background-image: linear-gradient(to right, #1D976C 0%, #93F9B9  51%, #1D976C  100%);
                margin: 10px;
                padding: 15px ;
                text-align: center;
                text-transform: uppercase;
                background-size: 200% auto;
                color: black;            
                border-radius: 10px;
                box-shadow: 0 0 20px #000;
                height:40px;
                width:130px;
                border-radius:10px;
                margin-top:10px;
                margin-bottom:50px;


        }
        table,tr,th,td{
                background-color: burlywood;
                border:1px solid black;
                
        }

        #itemname1,#itemname2,#itemname3,#itemprice1,#itemprice2,#mob1,#date1{
                height: 30px;
                border-radius: 5px;
                width:180px;
        }
        label{
            color: white;
        }
        body{  
            background-image:url('p4.jpg');
            background-size:cover;     
            }
    </style>
</head>
<body>
 <div class="admin" id="admin">
    <form action="" method="post">
 <div class="addingitem" id="addingitem">
    <label for="itemname1"><b>ITEM NAME</b></label>&nbsp;
    <input type="text" id="itemname1" name="itemname1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="itemprice1"><b>ITEM PRICE</b></label>&nbsp;
    <input type="text" id="itemprice1" name="itemprice1">
    <button  name ="addd" id="addd">ADD-ITEM</button><br><br><br><br>
</div>
 <div  class="updateingitem" id="updateingitem">
    <label for="itemname2"><b>ITEM NAME</b></label>&nbsp;
    <!--<input type="text" id="itemname2" name="itemname2" background: rgb(20,0,36);
                background: linear-gradient(90deg, rgba(20,0,36,1) 0%, rgba(13,70,108,1) 100%, rgba(0,212,255,1) 100%); >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $databasename="project";
    $con=  mysqli_connect($servername,$username,$password,$databasename);
    $sql="SELECT item FROM items ;";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
    ?>
    <select name="itemname2" id="itemname2" >
        <?php
    while($row = mysqli_fetch_array($result)) {
        ?>
                <option id="op"><?php echo "$row[item]" ?></option>
        <?php
            }
            }
        ?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <label for="itemprice2"><b>ITEM PRICE</b></label>&nbsp;
    <input type="text" id="itemprice2" name="itemprice2"  >
    <button  name ="update" id="update">UPDATE-ITEM</button><br><br><br><br>
</div>
<div  class="deleteingitem" id="deleteingitem">
    <label for="itemname3"><b>ITEM NAME</b></label>&nbsp;
    <!--<input type="text" id="itemname3" name="itemname3"  >-->
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $databasename="project";
    $con=  mysqli_connect($servername,$username,$password,$databasename);
    $sql="SELECT item FROM items ;";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
    ?>
    <select name="itemname3" id="itemname3" >
        <?php
    while($row = mysqli_fetch_array($result)) {
        ?>
                <option id="op"><?php echo "$row[item]" ?></option>
        <?php
    }
}
    ?>

            </select>
    <button  name ="delete" id="delete">DELETE-ITEM</button><br><br><br><br><br><br>
</div>
<button name ="exit" id="exit">HOME</button><br>
</form>
<button name="prebills" id="prebills" onclick="openForm()">enquiry bill</button><br>

<div class="pre" id="prebill">
        <form action="db3.php" method="post">
                <label for="mobile"><b>Mobile</b></label>
                        <input type="text" placeholder="Enter mobile number" name="mob1" id="mob1">
                <label for="mobile"><b>Date</b></label>
                        <input type="text" placeholder="yyyy-mm-dd" name="date1" id="date1">
                        <button type="submit" name="previousbill" id="previousbill">pre-bill</button>

                        <!-- <button name="previousbill" id="previousbill">pre-bill</button><br> -->
                        
</form>
                    </div>



</div> 





<?php

$servername="localhost";
$username="root";
$password="";
$databasename="project";
$con=  mysqli_connect($servername,$username,$password,$databasename);



//adding items and price to the menu
if(isset($_POST['addd']))
{
    $itemname=$_POST['itemname1'];
    $itemprice=$_POST['itemprice1'];
    $error=array();
    if(empty($itemname))
    {
        $error[]="please type itemname to add";
    
    }
    if(empty($itemprice))
    {
        $error[]="please type itemprice to add";
    
    }
    if(empty($error))
    {
        $qry="SELECT * FROM items WHERE item='$itemname';";
        $r=mysqli_query($con,$qry);
        $rc=mysqli_num_rows($r);
        if($rc!=0)
        {
            echo "<script>alert('This item is alredy exist');</script>";
        }
        else{
            $sql="INSERT INTO items(item,price)VALUES('$itemname','$itemprice');";
	        $con->query($sql);
	       // echo "<script>alert('$itemname is added');</script>";
            echo "<script>window.location.href='db2.php';</script>";

            //echo "<script>window.location.href='admin.html';</script>";
        }
       // echo "<script>window.location.href='admin.html';</script>";

    }else{
        foreach($error as $er)
        {
            echo "<script>alert('$er');</script>";

        }
    }
    //echo "<script>window.location.href='admin.html';</script>";

}


//updating the item price of the item in the menu
if(isset($_POST['update']))
{
    $itemname=$_POST['itemname2'];
    $itemprice=$_POST['itemprice2'];
    $error=array();
    if(empty($itemname))
    {
        $error[]=" please type the itemname you want to update";
    
    }
    if(empty($itemprice))
    {
        $error[]="please type the price you want to update";
    
    }
    if(empty($error))
    {
        
        $qry="SELECT * FROM items WHERE item='$itemname';";
        $r=mysqli_query($con,$qry);
        $rc=mysqli_num_rows($r);
        if($rc==0)
        {
            echo "<script>alert('This item is not in the menu');</script>";
        }
        else{

            $sql="UPDATE items SET price='$itemprice' WHERE item='$itemname'" ;
	        $con->query($sql);
	        echo "<script>alert('item and price is updated');</script>";
            echo "<script>window.location.href='db2.php';</script>";

        }
    }else{
        foreach($error as $er)
        {
            echo "<script>alert('$er');</script>";

        }
    }
    //echo "<script>window.location.href='admin.html';</script>";

}


//deleting the item from the menu
if(isset($_POST['delete']))
{
    $itemname=$_POST['itemname3'];
    $error=array();
    if(empty($itemname))
    {
        $error[]=" please type  the itemname you want to delete";
    
    }
    if(empty($error))
    {
        $qry="SELECT * FROM items WHERE item='$itemname';";
        $r=mysqli_query($con,$qry);
        $rc=mysqli_num_rows($r);
        if($rc==0)
        {
            echo "<script>alert('This item is not in the menu');</script>";
        }else
        {
            $sql="DELETE FROM  items WHERE item='$itemname';";
	        $con->query($sql);
	        echo "<script>alert('item is deleted');</script>";
            echo "<script>window.location.href='db2.php';</script>";
        }
    }else{
        foreach($error as $er)
        {
            echo "<script>alert('$er');</script>";

        }
    }
    //echo "<script>window.location.href='admin.html';</script>";

}
if(isset($_POST['exit']))
{
    //header("Location:front.php");
    echo "<script>window.location.href='front.php';</script>";

}






    echo "<div>";
	$sql="SELECT * FROM items ;";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
    ?>
    <table style="background-color:white;border:black;width:289px;margin-left:900px;margin-top:-580px;height:50px;" 
    class='table table-bordered table-striped'>
                      
		  <tr>
            <!--<td><b>no</b></td>-->
			<td><b>ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
			<td><b>PRICE&nbsp;  </b></td>
		  </tr>
          <?php
	    while($row = mysqli_fetch_array($result)) {
            ?>
        <tr>
			<!--<td><?php echo $row["itemno"]; ?></td>-->
            
			<td><?php echo $row["item"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
        </tr>
        <?php
        }
        ?>
</table>

<?php

//}
}

?>
</div>
<script src="avi1.js"></script>
</body>
</html> 
