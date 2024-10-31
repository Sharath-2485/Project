<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="avi.css"> -->
     <style>
            .main{
    display: flex;
    
    
}
body{
  background-image:url('p4.jpg');
  background-size:cover;
}
label{
  color: white;
}

.middle
{
    margin-top: 120px;
    display: inline;
    
}



.admin-container{
    display:flex;
}

#item{
    width: 100px;
    height: 30px;
    background-color:coral;
}
.top-buttons{
    margin-bottom: 20px;
    margin-left: 30px;
    color:white;
    margin-top: 5px; 
    padding: 20px;
    display: flex;

}
#counter-no{
    width: 50px;
    height: 40px;
}   

#itembox,#price,#qty,#mobile{
  height:40px;
  font-family:sans-serif;
  background-color: #dcdbe1;
  border:solid-black 0.5px;
  border-radius: 5px;
}
#date,#time{
  height:20px;
  font-family:sans-serif;
  background-color: #dcdbe1;
  border:solid-black 0.5px;
  border-radius: 5px;

}
.dtime{
  height:30px;
  margin-left: 20px;
  margin-top: 1px;
}
.mobile1{
  position: fixed;
  margin-top: 90px;
  right: 5px;
}
.admin{
    display:flex;
    padding: 20px;;
    
}
#sw{
  color:white;
 }
         
#itembtn {
    /* background-image: linear-gradient(to right, #1D976C 0%, #93F9B9  51%, #1D976C  100%);   */
     background-color:lightgreen;  
    text-decoration:bold;
    margin: 1px;
    padding: 5px ;
    text-transform: uppercase;
    text-align:center;
    background-size: 200% auto;
    color: Black;            
    border-radius: 10px;
    box-shadow: 0 0 20px #000;
    height:60px;
    width:180px;
    border-radius: 10px;

  }

  #itembtn:hover {
    background-position: right center; /* change the direction of the change here */
    background-color:brown;
    color: #fff;
    text-decoration: none;
  }
          
  #add,#clear,#showbill,#cancel,#update{
    background-image: linear-gradient(to right, #f46b45 0%, #eea849  51%, #f46b45  100%);
    margin: 10px;
    padding: 15px ;
    text-align:center;
    text-transform: uppercase;
    background-size: 200% auto;
    color: white;            
    box-shadow: 0 0 20px #000;
    border-radius: 10px;
    width: 100px;
    height: 70px;
    
  }

  #add:hover,#showbill:hover,#clear:hover,#cancel:hover {
    background-position: right center; /* change the direction of the change here */
    color: #eee;
    text-decoration: none;
  }
 

           
  #bill {
    background-image: linear-gradient(to right, #403A3E 0%, #BE5869  51%, #403A3E  100%);
    margin: 10px;
    padding: 15px;
    text-align: center;
    text-transform: uppercase;
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;
    margin-top: 5px;
    width: 130px;
    height: 40px;
  }

  #bill:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
  }

  #showall {
    background-image: linear-gradient(to right, #403A3E 0%, #BE5869  51%, #403A3E  100%);
    margin: 10px;
    padding: 15px;
    text-align: center;
    text-transform: uppercase;
    background-size: 200% auto;
    color: white;            
    border-radius: 10px;
    margin-top:60px;
    width: 130px;
    height: 40px;
  }

  #showall:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
  }
  #previousbill {
    background-image: linear-gradient(to right, #403A3E 0%, #BE5869  51%, #403A3E  100%);
    margin: 10px;
    padding: 15px;
    text-align: center;
    text-transform: uppercase;
    background-size: 200% auto;
    color: white;            
    box-shadow: 0 0 10px #eee;
    border-radius: 10px;
    margin-top:60px;
    width: 130px;
    height: 60px;
  }

  #previousbill:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
  }
  


 


</style>
</head>
<body >
<div class="main">

    <div class="top-buttons" >
        <form action="db1.php" method ="post">

        <div class="dtime">
        <label for="date">Date</label> <input type="text" name="date" id="date" value=<?php echo date('d-m-y'); ?> readonly></div>&nbsp<label for="mobile"><b>Mobile</b></label>
                        <input type="number" placeholder="Enter mobile number" name="mobile" id="mobile"><br><br>
            <label for="counter-no"> <b>TABLE NO</b></label>
            <select name="counter-no" id="counter-no" >
                <option id="op">1</option>
                <option id="op">2</option>
                <option id="op">3</option>
                <option id="op">4</option>
                <option id="op">5</option>
                <option id="op">6</option>
                <option id="op">7</option>
                <option id="op">8</option>
                <option id="op">9</option>
                <option id="op">10</option>

            </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <label ><b>ITEM</b></label>
            <input type="text" name="itembox" id="itembox" readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="price" >PRICE</label>
            <input type="text" id="price" name="price" readonly>&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="qty">QUANTITY</label>
            <input type="number" id="qty" name="qty" ><br><br><br><br>
            
            <?php
                $servername="localhost";
                $username="root";
                $password="";
                $databasename="project";
                $con=  mysqli_connect($servername,$username,$password,$databasename);

                $qry="SELECT * FROM items;";
                $r=mysqli_query($con,$qry);
                $rc=mysqli_num_rows($r);
                if($rc!=0)
                {
                    $count=0;
                    while($row = mysqli_fetch_array($r)) {
                        $count+=1;
                        ?>
                    <input type="button" name=<?php echo $row['price'];?> 
                    value="<?php echo $row['item'];?>" id="itembtn" onclick="itemclick(this)">&nbsp;
                        <?php
                        if($count==6)
                        {
                            echo "<br>";
                            $count=0;
                        }
                    }
                }   

            ?>
            </div>

                <div class="middle" id="middle">
                
                    <div class="buttons">
                        <button  name ="add" id="add">ADD</button><br>
                        <button  name ="update" id="update">UPDATE</button><br>
                        <button name="cancel" id="cancel">CANCEL</button><br>
                        <button name="showbill" id="showbill" >SHOW BILL</button><br>
                        <button name="showall" id="showall">TODAY BILL</button><br>
                        <button name='bill' id='bill'>BILL</button><br>
                        <a style="color:white;margin:50px;" href="front.php">HOME</a>

                        
                        
                     
                    </div>
                </div>
               

        </form>
</div>
<script src="avi1.js"></script>
</body>
</html>