<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<style>

*, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: #fff5e6;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #ff6680;
}

.form {
  background: #ffffff;
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px <!--rgb(255, 255, 240)-->;
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: #ffcccc;
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #ff4d4d;
  color: black;
}
.tab-group .active a {
  background: #F7786B;
  color: black;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: black;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: black;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: black;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: black;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #F7786B;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #fff5e6;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
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

    




</style>



<body>

<div class = "hidden-xs hidden-sm">

<ul>

<li><a href="first-2.php">Sign in</a></li>



<li><a href="shop.php">Shop</a></li>



 <li><a href="fhome.php">Home</a></li>



</ul>

</div>

<div class = "hidden-md hidden-lg">

<ul>

<li><a href="first-2.php">Sign in</a></li>


 <li><a href="shop.php">Shop</a></li>



</ul>

</div>


   <?php
   
$servername = "localhost";
$username = "root";
$password = "Palacios23";
$dbname = "it202";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   
    if($_POST["fn"]=="" || $_POST["ln"]=="" || $_POST["email"]=="" || $_POST["pwd"]==""){
        echo "Please fill in all the fields!!";
    }else{
        
        $fn = $_POST["fn"];
        $ln = $_POST["ln"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
	$salt = hash("sha256", $pwd);
        
        $sqlquery = "insert into Users values('$fn','$ln','$email','$pwd', '$salt')";
        $conn->query($sqlquery);
        
        
    }
    
           
     ?>   
<div class="form">

          <h1>Sign Up for Free</h1>
          
          <form action="first-2.1.php" method="post">
             
          <div class="top-row">
            <div class="field-wrap">
              
                First Name:
              
              <input type="text" name="fn" required>
            </div>
        
            <div class="field-wrap">
           
                Last Name:
            
              <input type="text" name="ln"/>
            </div>
          </div>

          <div class="field-wrap">
          
              Email Address: 
           
            <input type="email" name="email"/>
          </div>
          
          <div class="field-wrap">
           
              Set A Password: 
           
            <input type="password" name="pwd"/>
            
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        
    
      
</div> <!-- /form -->

</body>
