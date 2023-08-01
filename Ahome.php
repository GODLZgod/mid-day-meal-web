<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>Home Page </title>
   <link rel="stylesheet" href="home.css">
</head>
<body>
   <div class="main">
       <div class="navbar">
           <div class="icon">
               <h2 class="logo"></h2>
           </div>
     
            <br><br>
            <?php session_start();
            echo $_SESSION['name'];
            ?>
           <div class="menu">

               <ul>
               <?php if (!isset($_SESSION["logged_in"])): ?>
                       <li >
                        <a  href="project.html">login</a>
                        </li>
<?php 
endif; 

?>
  <?php
    if (isset($_SESSION["logged_in"])):
                        ?>
<li >
                        <a  href="project.html">logout</a>
                        </li>
                        <?php
                        endif;
                        ?>
                   <li><a href="home.html">HOME</a></li>
                   <li><a href="Areport.php"> Report</a></li>
                   <li><a href="supply1.html"> supply</a></li>
               </ul>
           </div>
         

           <div class="content">
               <h1>School Education</h1>
               <p>
              
                   You cannot teach a child any more than you can grow a plant. The plant develops its own nature. <br>
                   The child also teaches itself. But you can help it to go forward in its own way. <br>
                   What you can do is not of a positive nature but negative. You can take away the obstacles and knowledge comes out of its own nature. Loosen the soil a little, <br>
                   so that it may come out easily. Put a hedge round it, <br>
                   see that it is not kitted by anything. You can supply the growing seed with the materials for the making up of its body, <br>
                   brining to it the earth, the water, the air that it wants. And there your work stops. <br>
                   - Swami Vivekanand

               </p>

           </div>
       </div>
   </div>
</body>
</html>