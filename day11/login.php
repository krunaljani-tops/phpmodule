
<?php
    session_start();
    $message="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Step 1: Connect to MySQL
        $servername = "localhost";
        $username = "root";
        $password = ""; // Default is blank on XAMPP
        $dbname = "test_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Step 2: Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

         // $con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect');
        $result = mysqli_query($conn,"SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>