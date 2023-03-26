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
    <title>Home</title>
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
        <?php 
            
            $id = $_SESSION['Id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Age = $result['Age'];
                $res_Email = $result['Email'];
                $res_Id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>

    </div>
    <main>
        <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
            </div>
          </div>
       </div>
    </main>
</body>
</html>