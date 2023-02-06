<!DOCTYPE html>
<html>
<head>
<title>HOME</title>
<style>

#myHeader {
  background-color: white;
  color: black;
  padding: 25px;
  text-align: left;
  
} 

body{
	background-image:url("sky.png");
}

p,h1 {
  border: 2px solid red;
  border-radius: 5px;
 }


.topnav {
  overflow: hidden;
  background-color:#CD5C5C;
}


.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

</style>
<link rel="icon" type="image/jpg" href="week3/jarvis.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="topnav">
  <a href="#">HOME</a>
  <a href="#">DIARY</a>
  <a href="#">OTHERS</a>
</div>

<body>
<h1 id= "myHeader"> Welcome!</h1>
<img src="jarvis.jpg" height="277">
<style>


img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}


</style>



<div>
<p style="background-color:white;font-family:courier;text-align:center;">I am a 20-year-old chronically online, second-year IT student studying at Asia Pacific College. My hobbies are keeping up with pop culture, listening to music <del>stan SZA</del>, and watching films.</P>
<!-- <p>This is my description </p> -->
<p style="background-color:white;font-family:courier;text-align:center;"> Current Favorite</p>
<div class="row">
  <div class="column">
    <img src="HTG.jpg" alt="Snow" style="width:50%">
  </div>
  <div class="column">
    <img src="SOS.jpg" alt="Forest" style="width:50%">
  </div>
  <div class="column">
    <img src="beetopia.jpg" alt="Mountains" style="width:50%">
  </div>
</div>
<p style="background-color:white;font-family:courier;text-align:center;">Contact Me:</p>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div>

<!-- Add font awesome icons -->
<div style= "text-align:center;">
<a href="https://www.facebook.com/jarvis.carpo" class="fa fa-facebook" ></a>
<a href="https://twitter.com/kandydroppe" class="fa fa-twitter"></a> 
<a href="https://www.instagram.com/kandydroppe/" class="fa fa-instagram"></a>




<style>
.fa {
  padding: 10px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
}

.fa-facebook {
  background: #3B5998;
   color: white;

}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}

}
</style>
</div>

<p style="background-color:white;font-family:courier;text-align:center;">PHP Form Validation Example</p>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>