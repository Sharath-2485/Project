<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body{
                
			background-image:url('p7.jpg');
                background-size:cover;
		}
		</style>
</head>
<body>
	


<?php
$servername="localhost";
$username="root";
$password="";
$databasename="project";
$con=  mysqli_connect($servername,$username,$password,$databasename);
$total=0;
if(isset($_POST['previousbill']))
 	{
		
		$mob1=$_POST['mob1'];
		$date1=$_POST['date1'];
		if(empty($mob1) || empty($date1))
		{
            echo "<script>alert('please enter valid data');</script>";
			echo "<script>window.location.href='db2.php';</script>";


		}
		else{
		$sql="SELECT * FROM record WHERE mobile='$mob1' and datee='$date1';";
		$result = $con->query($sql);

	if ($result->num_rows > 0) {
  		// output data of each row
		?>
		<center>
		<div style="background-color:white;width: 380px;">
		
		<h2 > SWATHI GRAND</h2>
		kundapur<br>
		ph:9956784323,251345<br>
		<?php
				echo "Date: " .date('y-m-d'); ?><br>
		-----------------------------------------------------------------
		<table style=" border:white;" class='table table-bordered table-striped'>
                      
		  <tr>
			<!--<td>C.NO</td>-->
			<td><b>ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
			<td><b>QNT</b></td>
			<td><b>RATE</b></td>
			<td><b>AMOUNT</b></td>
		  </tr>

		<?php
	    while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<!--<td><?php echo $row["counterno"]; ?></td>-->
			<td><?php echo strtoupper($row["item"]); ?></td>
			<td><?php echo $row["quantity"]; ?></td>
			<td><?php echo $row["price"].".00"; ?></td>
			<?php
			$total+=$row["quantity"]*$row["price"];
			?>
			<td><?php echo $row["quantity"]*$row["price"].".00"; ?></td>
			
		</tr>
		
		<?php 
		}
		?>
		<tr >
			<td ></td>
			<td ></td>
			<td ></td>
			<td ><b>Total:<?php echo $total;?></b></td>
		</tr>
		</table>
		------------------------------------------------------------------<br>
		thank you.....visit again
	

	</div><br><br>
		<a style="color:white;"href="db2.php">BACK</a>
	
	


	</center>
		<?php 
			} else {
				echo "<script>alert('record not present');</script>";
			   echo "<script>window.location.href='db2.php';</script>";
	   
	   
		   }
			   
		   }
	}
		   ?>
		   </body>
</html>