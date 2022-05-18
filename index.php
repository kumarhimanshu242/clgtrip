



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future College Trip</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bg">
    <img class="bg" src="bg.jpeg" alt="Future college">
    <div class="container">
        <h1><u>Welcome to Future College trip to Rishikesh</u></h1>
        <p class="det">Please enter your details and submit to confirm your participaton in the trip</p>
       

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required><br>
            <input type="text" name="age" id="age" placeholder="Enter your age" required><br>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required><br>
            <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
            <input type="number" name="phone" id="phone" placeholder="Enter your phone" required><br>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Any suggestion for us"></textarea><br>
            <input type="submit" class="btn">
            <input type="reset" class="btn">
        </form>
    </div>
    </div>
</body>
</html>


<!-- php code to connect database -->

<?php error_reporting (E_ALL ^ E_NOTICE);
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "magento242";

        $con = mysqli_connect($server, $username, $password);

        if (!$con){
            die("connection to this database failed due to ".mysqli_connect_error()); 
        }
        // echo "Sucsess connecting to the database"
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip`.`clg_trip` (`name`, `age`, `gender`, `email`, `phone`, `suggestion`, `datetime`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // echo $sql;

        if ($con->query($sql) == true){
            echo "";?>
             <p class="submitmsg">Thanks for submitting your details and we are happy to see you joining us on the trip</p>
        <?php
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();
    }
?>


