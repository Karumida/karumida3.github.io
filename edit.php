<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <title>Edit</title>
</head>
<body>
    <div class="nav">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="home.php">Home</a>
        <a href="#">About Us</a>
    </div>
        <div class="logo">
            <p>Activity 2</p>
           </div>
        <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
            </span>
            <script>
                function openNav() {
                  document.getElementById("mySidenav").style.width = "200px";
                  document.getElementById("main").style.marginLeft = "200px";
                  document.getElementById("mySidenav").style.opacity = "100%";
                  document.getElementById("main").style.opacity = "100%";
                  document.getElementById("Bottomnav").style.opacity=0;
                  document.getElementById("playtab").style.opacity=0;
                  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }
                
                function closeNav() {
                  document.getElementById("mySidenav").style.width = "0";
                  document.getElementById("main").style.marginLeft= "0";
                  document.getElementById("main").style.opacity = "100%";
                  document.getElementById("Bottomnav").style.opacity="100%";
                  document.getElementById("playtab").style.opacity="100%";
                  document.body.style.backgroundColor = "white";
                }
                </script>   
        </div>
        <div class="right-links">
            <a href="logout.php"><button class="btn">logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">

        <?php 
               if(isset($_POST['Change'])){
                $username = $_POST['Username'];
                $age = $_POST['Age'];
                $email = $_POST['Email'];

                $id = $_SESSION['Id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Age='$age' ,Email='$email' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['Id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Age = $result['Age'];
                    $res_Email = $result['Email'];
                }

            ?>

            <header>Change Profile</header>
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
                    <input type="submit" class="btn" name="Change" value="Change" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>