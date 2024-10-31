<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		#ok{
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
			border-radius: 10px;
			}
		body{
			background-image:url('p7.jpg');
			background-size: cover;
			}
		table{
			border:solid black;
			}
	</style>
</head>
<body >

<?php
	$itembox=trim($_POST['itembox']);
    $qty=trim($_POST['qty']);
    $error=array();
    if(empty($itembox))
    {
        $error[]="please select the item";
    
    }
    if(empty($qty))
    {
        $error[]="please put the quantity";
    
    }
	$total=0;
	$servername="localhost";
	$username="root";
	$password="";
	$databasename="project";
	$con=  mysqli_connect($servername,$username,$password,$databasename);

	///////////////////////ADD BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['add']))
	{
		if(empty($error))
		{
			$counterno=$_POST['counter-no'];
			$item=$_POST['itembox'];
			$quantity=$_POST['qty'];
			$price=$_POST['price'];
			$sql="INSERT INTO bills(counterno,item,quantity,price)VALUES('$counterno','$item','$quantity','$price');";
			$rs=$con->query($sql);
			echo "<script>window.location.href='avi1.php';</script>";
		}else{
			foreach($error as $er)
			{
				echo "<script>alert('$er');</script>";
			}
			echo "<script>window.location.href='avi1.php';</script>";
		}
	}

	///////////////////////UPDATE BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['update']))
	{
		$counterno=$_POST['counter-no'];
		$item=$_POST['itembox'];
		$quantity=$_POST['qty'];
		$price=$_POST['price'];
		$sql="UPDATE bills SET quantity='$quantity' WHERE counterno='$counterno' and item='$item';";
		$con->query($sql);
		echo "<script>alert('item is updateed');</script>";
		echo "<script>window.location.href='avi1.php';</script>";
	}
	       
	///////////////////////CANCEL BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['cancel']))
	{
		$counterno=$_POST['counter-no'];
		$item=$_POST['itembox'];
		$quantity=$_POST['qty'];
		$price=$_POST['price'];
		$sql="DELETE FROM bills WHERE counterno='$counterno' and item='$item';";
		$con->query($sql);
		echo "<script>alert('item is cancel');</script>";
		echo "<script>window.location.href='avi1.php';</script>";
	}

	///////////////////////BILL BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['bill']))
	{
		$counterno=$_POST['counter-no'];
		if(empty($_POST['mobile'])){
			echo "<script>alert('Enter Mobile Number');</script>";	
			echo "<script>window.location.href='avi1.php';</script>";
		}else{
			$counterno=$_POST['counter-no'];
			$sql="SELECT * FROM bills WHERE counterno='$counterno';";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				?>
				<center>
				<div style="background-color:white;width: 380px;">
					<h2 > SWATHI GRAND</h2>
					kundapur<br>
					ph:9956784323,251345<br>
					<?php 
							echo "Date: " .date('y-m-d') ?><br>
					-----------------------------------------------------------------
					<table style=" border:white;" class='table table-bordered table-striped'>
							
						<tr>
							<td><b>ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
							<td><b>QNT</b></td>
							<td><b>RATE</b></td>
							<td><b>AMOUNT</b></td>
						</tr>

						<?php
							while($row = mysqli_fetch_array($result)) {
						?>
						<tr>
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
				<form action="" method="post">
				<button  name ="ok" id="ok">OK</button><br>
				</form>

				</center>
				<?php 
						$mob=$_POST['mobile'];
						$q="UPDATE bills SET mobile='$mob';";
						$con->query($q);
						$qry="INSERT INTO record(counterno,item,quantity,price,mobile)
						SELECT counterno,item,quantity,price,mobile FROM bills WHERE counterno='$counterno';";
						$con->query($qry);
						$sql="DELETE FROM bills WHERE counterno='$counterno';";
						$con->query($sql);
			
			} else {
				echo "<script>alert('no item ordered for this counter');</script>";
				echo "<script>window.location.href='avi1.php';</script>";


			}
		}
			
	}

	///////////////////////TODAY BILL BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['showall']))
	{
		echo "<center><h1 style='background-color:#eee;'>TODAY BILL DETAILS</h1></center>";
		$datee=date('y-m-d');
		$date1="20".$datee;
		$counterno=$_POST['counter-no'];
		$sql="SELECT * FROM record where datee='$date1'";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			?>
			<center>
			<div style="background-color:white;width: 380px;">
		
				<h2 > SWATHI GRAND</h2>
				kundapur<br>
				ph:9956784323,251345<br>
				<?php 
					echo "Date: " .date('y-m-d') ?><br>
					-----------------------------------------------------------------
					<table style=" border:white;" class='table table-bordered table-striped'>			
						<tr>
							<td><b>ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
							<td><b>QNT</b></td>
							<td><b>RATE</b></td>
							<td><b>AMOUNT</b></td>
						</tr>

						<?php
							while($row = mysqli_fetch_array($result)) {
						?>
						<tr>
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
				thank you.....visit again<br>
			</div>
			<form action="" method="post">
			<button  name ="ok" id="ok">OK</button><br>
			</form>
			<?php
		}else{
			echo "<script>alert('no record');</script>";
			echo "<script>window.location.href='avi1.php';</script>";
		}
	}

	///////////////////////SHOW BILL BUTTON CODE///////////////////////////////////////////////////////////////////////////////
if(isset($_POST['showbill']))
 	{
		$counterno=$_POST['counter-no'];
		$sql="SELECT * FROM bills WHERE counterno='$counterno';";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
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
								<td><b>ITEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
								<td><b>QNT</b></td>
								<td><b>RATE</b></td>
								<td><b>AMOUNT</b></td>
		  					</tr>
							<?php
								while($row = mysqli_fetch_array($result)) {
									?>
									<tr>
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
							<tr>
								<td ></td>
								<td ></td>
								<td ></td>
								<td ><b>Total:<?php echo $total;?></b></td>
							</tr>
						</table>
					------------------------------------------------------------------<br>
					thank you.....visit again
				</div><br><br>
				
			</center>
			<?php 
		} else {
				echo "<script>alert('no item ordered for this counter');</script>";
				echo "<script>window.location.href='avi1.php';</script>";
		}
		echo "<center><a style='color:white;' href='avi1.php'>back</a></center>";
	}

	/////////////////////// OK BUTTON CODE///////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['ok']))
	{
			echo "<script>window.location.href='avi1.php';</script>";
	}
	
    ?>
	</body>
</html>
