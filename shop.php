<!DOCTYPE html>
<html>

<head>
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

    <option value="select">Select</option>	
    <option value="Dresses">Dresses</option>
    <option value="Shoes">Heels</option>
    <option value="Necklace Accesories">accesories</option>
</select>

  Price:
  <input type="number" name="price"
   min="0" max="100" value="0" step = "20">



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
<input type = "submit" value= "search">

</form>


<div class="rate" hidden>
<form action="shop.php">
  Rate Product (between 1 and 5):
  <input type="number" name="quantity" min="1" max="5">
  <input type="submit">
</form>
</div>

<script src="shop.php"></script>
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
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . $row["url"] .  "<br>";
	 
echo "<br> <img src= '" . $row["url"] . "'><br>";


}}}

if ($tags == "Shoes") {
$sql ="select * from  Products where tag like 'heels'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . $row["url"] .  "<br>";
	 
echo "<br> <img src= '" . $row["url"] . "'><br>";

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
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . $row["url"] .  "<br>";
	 
echo "<br> <img src= '" . $row["url"] . "'><br>";

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
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . $row["url"] .  "<br>";

echo "<br> <img src= '" . $row["url"] . "'><br>";
rateProduct();

}
} else {
    echo "0 results";
}
$conn->close();
}


if ($price != 0) {
$sql ="select * from  Products where price <= $price";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . $row["url"] .  "<br>";

echo "<br> <img src= '" . $row["url"] . "'><br>";
rateProduct();

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
    while($row = $result->fetch_assoc()) {
        echo "ProductId: " . $row["productId"] . " -stocks: " . $row["stocks"] . "price" . $row["price"] . "color" . $row["color"] . "" . " size " . " " . $row["size"] . "" .   $row["url"] .  "<br>";

echo "<br> <img src= '" . $row["url"] . "'><br>";


}
} else {
    echo "0 results";
}
$conn->close();
}

// rate products unable to make it work 
function rateProduct() {
 '<div class="rate"><form action="shop.php">Rate Product (between 1 and 5) <input type="number" name="rnum" min="1" max="5"><input type="submit"></form></div>'; 

$rnum = $_POST["rnum"];

$sqlquery = "insert into ratings values(productID, 'customer',$rnum)";
$conn->query($sqlquery);

}


?>
