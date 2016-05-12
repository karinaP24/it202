<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>

body {
  background: #fff5e6;
  font-family: 'Titillium Web', sans-serif;
}
ul {

    list-style-type: none;

    margin: 0;

    padding: 7px;

    overflow: hidden;

    background-color:#fff5e6;

}



li {

    float: right;

}



li a {

    display: block;

    color: black;

    text-align: center;

    padding: 14px 16px;

    text-decoration: none;

}



li a:hover {

    background-color:#fff5e6;

}

div.rate {
    background-color: #e5eecc;
    padding: 7px;
    border: solid 1px #c3c3c3;
}




</style>

</head>

<body>
<ul>

<li><a href="first-2.php">Sign in</a></li>



<li><a href="shop.php">Shop</a></li>



 <li><a href="fhome.php">Home</a></li>



</ul>


<form action="shop.php" method ="post">
  <select name="tags">
  
    Type:
    <option value="select">Select</option>	
    <option value="Dresses">Dresses</option>
    <option value="Shoes">Heels</option>
    <option value="Necklace Accesories">accesories</option>
</select>

  Under Price:
  <input type="number" name="price"
   min="0" max="100" value="0" step = "20">


  Size:
  <select name="Size">
    <option value="-">---</option>
    <option value="6">6</option>   
    <option value="7">7</option>      
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>


  </select> 
<input type = "submit" value= "search"><br />




</div>

<script>
function mydemo() {
    document.getElementById("demo").style.color = "red";
}
</script>
<script>

</script>



<?php

$servername = "localhost";
$username = "root";
$password = "Palacios23";
$dbname = "it202";

$tags = $_POST["tags"];
$price = $_POST["price"];
$size = $_POST["Size"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($tags == "select" && $price == "0" && $size == "-") {
$sql = "select * from Products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
	echo "<br> <div id='top' class = 'abc container col-sm-3'> <a href= '#top'";
	echo "<br> <img src= '" . $row["url"] . "' width = '150' heigth = '150'> </a>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . " <br> ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"];

echo "</div>";
	
	 

//rateProduct($row["productId"]);

}}}

if ($tags == "Shoes") {
$sql ="select * from  Products where tag like 'heels'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	echo "<div class = 'abc container col-sm-3'>";
	echo "<br> <img src= '" . $row["url"] . "' width = '100' heigth = '100'>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . "  ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"];

echo "</div>";
}
} else {
    echo "0 results";
}
$conn->close();
}
if ($tags == "Necklace Accesories") {
$sql ="select * from  Products where tag like 'accessories'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'abc container col-sm-3'>";
	echo "<br> <img src= '" . $row["url"] . "' width = '100' heigth = '100'>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . "  ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"];

echo "</div>";
//rateProduct($row["productId"]);
}
} else {
    echo "0 results";
}
$conn->close();
}
if ($tags == "Dresses") {
$sql ="select * from  Products where tag like 'dress'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'abc container col-sm-3'>";
	echo "<br> <img src= '" . $row["url"] . "' width = '100' heigth = '100'>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . "  ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"];

echo "</div>";
//rateProduct($row["productId"]);
}
} else {
    echo "0 results";
}
$conn->close();
}


if ($price != 0) {
$sql ="select * from  Products where price <= $price order by price desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo " <br> Products under the price of $price <br>";
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'abc container col-sm-3'>";
	echo "<br> <img src= '" . $row["url"] . "' width = '100' heigth = '100'>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . "  ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"];

echo "</div>";
//rateProduct($row["productId"]);
}
} else {
    echo "0 results";
}
$conn->close();
}

if ($size != "-") {
$sql ="select * from  Products where size = '$size' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo " <br> Products with size $size <br>";
    while($row = $result->fetch_assoc()) {
        echo "<div class = 'abc container col-sm-3'>";
	echo "<br> <img src= '" . $row["url"] . "' width = '100' heigth = '100'>";
        echo "<br>" . "ProductId: " . " " . $row["productId"] . "  ". " Stocks: " . $row["stocks"] . "  ". "Price: " . "$". $row["price"] . "  ". "Color: " . $row["color"]. "<br>" . "Size: " . $row["size"];

echo "</div>";

//rateProduct($row["productId"]);
}
} else {
    echo "0 results";
}
$conn->close();
}

// rate products unable to make it work 

function rateProduct($productId) {
echo ' <form name="login" action="shop.php" method="post"> Rate Product (between 1 and 5) <input type="number" name="rnum" min="1" max="5"> <input type="submit" value="Submit"> <br>'; 


$rnum = $_POST["rnum"];

echo $rnum; 
$sqlquery = "insert into ratings values($productId, 'customer',$rnum)";
//$conn->query($sqlquery);

}




?>




