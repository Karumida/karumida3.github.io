<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <title>Login</title>
</head>
<body>
        <?php 
             
             include("php/config.php");
             if(isset($_POST['submit'])){
               $username = mysqli_real_escape_string($con,$_POST['Username']);
               $password = mysqli_real_escape_string($con,$_POST['Password']);

               $result = mysqli_query($con,"SELECT * FROM users WHERE Username='$username' AND Password='$password' ") or die("Select Error");
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['valid'] = $row['Email'];
                   $_SESSION['username'] = $row['Username'];
                   $_SESSION['age'] = $row['Age'];
                   $_SESSION['id'] = $row['Id'];
               }else{
                   echo "<div class='message'>
                     <p>Wrong Username or Password</p>
                      </div> <br>";
                  echo "<a href='index.php'><button class='btn'>Go Back</button>";
        
               }
               if(isset($_SESSION['valid'])){
                   header("Location: home.php");
               }
             }else{

           
           ?>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                
                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="Username" id="Username" required>
                </div>

                <div class="field input">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have Account? <a href="register.php">Sign up!</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>