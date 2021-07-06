<?php
session_start();
$insert = false;
if(isset($_POST['name'])){
    // Set Connection Variables
   /*
   $_server = "sql313.epizy.com";
   $username = "epiz_29007088";
   $password = "mmGXs5c0Q6";
   $dbname = "epiz_29007088_us_excursion";
   
   //Create a database connection
   $con = mysqli_connect($_server, $username, $password, $dbname);
   */
   $_server = "localhost";
   $username = "root";
   $password = "";
   
   //Create a database connection
   $con = mysqli_connect($_server, $username, $password);

   //Check for connection success
   if(!$con)
   {
       die("Connection to this Database failed due to ".mysqli_connect_error());
   }
    //Collect Post Variables
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $clgname = $_POST['clgname'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `us_excursion`.`us_excursion`(`Name`, `Age`, `Mail Id.`, `Phone Number`, `College Name`, `Other Details`, `Date`) 
   VALUES ('$name', '$age', '$email', '$phone', '$clgname', '$desc', current_timestamp())";

   //Execute the Query
   if($con->query($sql) == true)
   {
       $insert = true;
   }
   else
   {
    echo "ERROR : $sql <br> $con->error" ;
    
   }
   //Close the database connection
   $con->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title img="logo.jpg">Excursion_Form</title>
</head>
<body>
    <img class="bg" src="bg.jpg" alt="US image">
    <div class="container">
        <h1>
            ~ Welcome To The US Excursion Form ~
        </h1>
        <p class="p1">
            Enter Your Details To Confirm Your Participation In The Excursion.
        </p>
        <?php
        if($insert == true){
        echo "<p class='submit_msg'><b>Thanks for submitting your form. 
            We are happy to see you joining for the US excursion.</b></p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" required name="name" id="name" placeholder="Enter your Name..">
            <input type="text" required name="age" id="age" placeholder="Enter your Age..">
            <input type="email" required name="email" id="email" placeholder="Enter your Mail Id..">
            <input type="phone" required name="phone" id="phone" placeholder="Enter your Phone Number..">
            <input type="text" required name="clgname" id="clgname" placeholder="Enter your College Name..">
            <textarea name="desc" id="desc" cols="30" rows="10" required placeholder="Enter any other information here.."></textarea>
            <button class="btn">Submit</button><br>
        </form>
    </div>
    <hr class="solid">
    <footer class="f1">
       <b>All rights are reserved © SRIJA</b><br><br>
        <b>Connect With Me :</b>
        <a href="https://www.linkedin.com/in/srija-talukdar-8608261b0/"><img id="account" src="linkedin.jpg" height="40px" width="40px" alt="Linkedin Profile of Srija"></a>
        <a href="https://github.com/Srija17"><img id="account" src="github.jpg" height="40px" width="40px" alt="Github Profile of Srija" ></a>
        <a href="https://www.instagram.com/srijatalukdar_/"><img id="account" src="instagram.jpg" height="43px" width="44px" alt="Instagram Profile of Srija" ></a>
        <a href="https://www.facebook.com/srija.talukdar.98"><img id="account" src="facebook.jpg" height="40px" width="43px" alt="Facebook Profile of Srija" ></a>
    </footer>
</body>
</html>