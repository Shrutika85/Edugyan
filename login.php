<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="assets/css/login.css">
        <?php
  include('conn.php');
  
  ?>  
    </head>
    <body>
            <form class="form" action="login.php" method="post">
            <p class="title">Login </p>
            <p class="message">Login now and get full access to our website. </p>
                    
            <label>
                <input required="" placeholder="" type="email" name="email" class="input">
                <span>Email</span>
            </label> 
                
            <label>
                <input required="" placeholder="" type="password"  name="password" class="input">
                <span>Password</span>
            </label>
           
            <input type="submit" class="submit" name="submit_button" value="submit"></input>
            <p class="signin">Already have an acount ? <a href="signup.php">Signup</a> </p>
        </form>
    </body>
</html>

<?php
include('conn.php');
 if (isset($_POST['submit_button']))
 {
    
     $log=0;
     $log2=0;
     extract($_POST);
     $username=mysqli_real_escape_string($connect,$_POST['email']);

     $password=mysqli_real_escape_string($connect,$_POST['password']);
     echo $check="select * from user where  email='$username' and password='$password'";
    
    echo $check2="select * from user where email='$username' or password='$password'";
    $log2=mysqli_query($connect,$check2)
     or die(mysqli_error($connect));



     $log=mysqli_query($connect,$check)
     or die(mysqli_error($connect));
     if(mysqli_num_rows($log)>0)
     {
       
  // Start the session
  session_start();

  // Set session variables
  $_SESSION["user_name"]= $username;
  

         
         
             echo "<script>;";
          
             echo 'window.location.href="index.html";';
             echo "</script>;";
         
        
     }
     else
     if(mysqli_num_rows($log2)>0)
     {
        echo"<script>;";
        echo "window.alert('your username or password is incorrect!!');";
        echo 'window.location.href="login.php";';
        echo"</script>;";
     }
     else
     {
         echo"<script>;";
         echo "window.alert('unregistered user!!');";
         echo 'window.location.href="signup.php";';
         echo"</script>;";
     }
       
        

 }


?>
