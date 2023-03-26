<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['Username'];
            $age = $_POST['Age'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];


            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email= '$email'");

            if(mysqli_num_rows($verify_query) !=0){
                echo "<div class='message'>
                <p> This Email is used, Try another one please!</p>
                </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class'btn'>Go back</button>";
            }
            else{

                 mysqli_query($con,"insert into users(Username,Age,Email,Password) VALUES('$username','$age','$email','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }
        }else{

        ?>

            <header>SignUp</header>
            <form action="" method="post">
                
                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="Username" id="Username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Age">Age</label>
                    <input type="text" name="Age" id="Age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Password">Password</label>
                    <input type="text" name="Password" id="Password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btn" name="submit" value="SignUp" required>
                </div>
                <div class="links">
                    Have a Account Already? <a href="index.php">Login Now!</a>
                </div>
            </form>
        </div>
    <?php } ?>
    </div>
</body>
</html>