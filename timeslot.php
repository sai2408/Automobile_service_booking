<?php

error_reporting(0);
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "shop_db");

// Check connection
$select1 = mysqli_query($link, "SELECT * FROM `timeslot` ") or die('query failed');

if(mysqli_num_rows($select1) > 7){
    echo "<h2>No slots available, please try again next day</h2>";
}
else{
    $data = $_REQUEST['radios'];
    $select = mysqli_query($link, "SELECT * FROM `timeslot` WHERE time = '$data'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        echo "<h2>Slot was already booked<br>Please choose another one</h2>";
    }
    else{
        $sql = "INSERT INTO timeslot (time) VALUES ('$data')";
        if(mysqli_query($link, $sql)){
            echo "<h2>Your slot sucessfully booked at $data </h2>";
        } 
    }
}


mysqli_close($link);
?>
<html> 
    <head>
        <title>
            time slot
        </title>
    </head>
    <link rel="stylesheet" href="timeslot.css">
    <body>
        
<form action="" method="POST">
<div>
<input type="radio" name="radios" id="radio1" class="radio" value="10am" checked/>10am
<label for="radio1">10 AM</label> 
</div>

<div>
<input type="radio" name="radios" id="radio2" class="radio" value="11am"/>
<label for="radio2">11 AM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio3" class="radio" value="12pm"/>
<label for="radio3">12 PM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio4" class="radio" value="1pm"/>
<label for="radio4">1 PM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio5" class="radio" value="2pm"/>
<label for="radio5">2 PM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio6" class="radio" value="3pm"/>
<label for="radio6">3 PM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio7" class="radio" value="4pm"/>
<label for="radio7">4 PM</label>
</div>

<div>	
<input type="radio" name="radios" id="radio8" class="radio" value="5pm"/>
<label for="radio8">5 PM</label>
</div>
<div>
    <br>
    <input style="color:black;background-color:cyan;height:25px;width:60px;font-style:verdena"  type="submit" name="submit" value="submit">
   
</div>
</form> 
<header class="header">
<div class="right">
            <a href="/vehicle_service/index1.php">HOME</a>
    </div>
</header>
</body>
</html>