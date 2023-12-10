<html>
    <head>
        <title>
            Signup
        </title>
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body>
            <form class="form" action="signup.php" method="post">
            <p class="title">Signup </p>
            <p class="message">Signup now and get full access to our website. </p>
            <div class="flex">
                <label>
                    <input required="" placeholder="" name="fname" type="text" class="input">
                    <span>Firstname</span>
                </label>

                <label>
                    <input required="" placeholder="" name="lname" type="text" class="input">
                    <span>Lastname</span>
                </label>
            </div>  
                    
            <label>
                <input required="" placeholder="" type="email" name="email" class="input">
                <span>Email</span>
            </label> 
                
            <label>
                <input required="" placeholder="" type="password" name="password" class="input">
                <span>Password</span>
            </label>
           
            <input type="submit" class="submit" name="submit_button" value="submit"></input>
            <p class="signin">Already have an acount ? <a href="login.php">Login</a> </p>
        </form>
    </body>
</html>


<?php
include('conn.php');
 if (isset($_POST['submit_button']))
 {
    
    
     extract($_POST);
     $username=mysqli_real_escape_string($connect,$_POST['email']);
     $fname=mysqli_real_escape_string($connect,$_POST['fname']);
     $lname=mysqli_real_escape_string($connect,$_POST['lname']);

     $password=mysqli_real_escape_string($connect,$_POST['password']);
     echo $insert="insert into user(first_name,last_name,email,password)
     value('$fname','$lname','$email','$password')";

     $add=mysqli_query($connect,$insert)or die (mysqli_error($connect));
     if($add)
     {


               
  // Start the session
  session_start();

  // Set session variables
  $_SESSION["user_name"]= $username;
  

         
         
             echo "<script>;";
          
             echo 'window.location.href="index.html";';
             echo "</script>;";
         
        
     }
    
       
     }
     else
     {   echo "<script>;";
         
        // echo 'window.location.href="signup.php";';
         echo "</script>;";
     }
 


    
 
        

 


?>
