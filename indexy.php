<?php
$insert=false;
if(isset($_POST['name'])){
    
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this db failed due to".mysqli_connect_error());
    }
    //echo "Success conencting to the db";

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];

    $sql="INSERT INTO `trip`.`trip` ( `name`, `gender`, `email`, `phone`, `remarks`, `date`) VALUES
    ( '$name', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if($con->query($sql)==true){
        //echo "Successfully inserted";
        $insert=true;
    }

    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book your Travel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="">
    <div class="container">
       <h1> Welcome to LPU Shimla-Manali Trip form</h1>
       <p>Enter your details here</p>
       <?php
       if($insert == true)
       {
       echo "<p class='submitmsg'>Thankyou for your response!!</p>";
       }
        ?>
       <form action="indexy.php" method="post">
           <input type="text" name="name" id="name" placeholder="Enter your name">
           <input type="text" name="gender" id="gender" placeholder="Enter your gender">
           <input type="email" name="email" id="email" placeholder="Enter your email">
           <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter remarks"></textarea>
           <button class="btn">Submit</button>
           <a href="index.html">Back to Home</a>
           
       </form>
    </div>
    <script src="index.js"></script>
</body>
</html>


