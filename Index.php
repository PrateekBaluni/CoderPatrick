<?php

  $insert = false; 

  if(isset($_POST['name']))
  {

       error_reporting(0);   /*********/ 


    //  Set connection variables

    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Sucess connecting to the DB";


    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

   
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `e-mail`, `phone no.`, `other`, `tt`)  VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

//    echo "<br>  ";
//     echo $sql;  


   // Execute the query
   if($con->query($sql) == true)
   {
    //    echo "Sucessfully inserted";

    // Flag for successful insertion
    $insert = true;       
   }

   else{
       echo "ERROR: $sql <br> $con->error";
   }

   // Close the database connection
   $con->close();
 }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="https://cdn.pixabay.com/photo/2017/08/06/00/31/nature-2587091__340.jpg" alt="The Aurora">
    <div class="container">
        <h1>Welcome to King Patrick County Trip Form</h1>
        <p>Enter ur details to confirm ur participation in this trip</p>
        
        <?php
      if($insert == true)
      {
        echo "<p class='submit_msg'>Thanks for submitting your form. We are happy to see you joining us for the County Trip.</p>";   }
     ?>
        <form action="Index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>

            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>
    <script src="index.js"></script>


</body>
</html>