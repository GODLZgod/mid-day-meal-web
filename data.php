<?php
$severname="localhost";
$username="root";
$password="";
$dbname="dhudha";
$conn =mysqli_connect($severname,$username,$password,$dbname);
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}

if(isset($_POST['sub']))
{
   

    $number=$_POST['number'];
    $liter=$_POST['liter'];
    $fat=$_POST['fat'];
    $rate=$fat*7.67;
    $amount=$rate*$liter;
    session_start();
    $_SESSION['cid']=$number;
    
   
   $date=date("j");
   $month=date("F");
   $year=date("Y");
   $c="SELECT * FROM `customer` WHERE `c_id`='$number'";
   $result=mysqli_query($conn,$c);
   while($rows=$result->fetch_assoc())
   {
    $name=$rows['c_name'];
    // session_start();
    $_SESSION['id']=$rows['c_id'];
   }
   $abc="INSERT INTO `data`( `liter`, `fat`, `rate`, `amount`, `c_id`, `c_name`,`date`, `month`, `year`) VALUES ('$liter','$fat','$rate','$amount','$number','$name','$date','$month','$year')";
   $c="SELECT * FROM `advance` WHERE `c_id`='$number'";
   $results=mysqli_query($conn,$c);
   while($row=$results->fetch_assoc())
   {
    $return=$row['r_return'];
    // session_start();
   
   }
   if($return!=0)
   {

       if($return>$amount)
       {
           $pay=$amount/2;
           $return=$return-($amount/2);
        //    $return=$ret;
        }
        else
        {
            $pay=$amount/2;
            $return=$return-$amount;
        }
    }
   $ab="UPDATE `advance` SET `r_return`='$return',`amount`='$amount',`payed`='$pay',`date`='$date',`month`='$month',`year`='$year' WHERE `c_id`like'$number' "; 
   $res=mysqli_query($conn,$ab);
   // $abc="insert into report(ri ce,student,dal,salary)values($rice,$student,$dal,$salary)";
    // $abc="INSERT INTO `report` (`sid`,`plates`, `student`, `rice`, `mug-dal`, `masoor-dal`, `Tur-dal`, `matki`, `harbara`, `vatana`, `Turmeric`, `salary`, `Spice`, `jeera`, `mohri`, `vegetables`, `fuel`,`date`, `month`, `year`,`class`) VALUES ('$sid','$plate','$student', '$rice', '$mug', '$masoor', '$tur', '$matki', '$harbara', '$vatana', '$turmeric', '$salary', '$spice', '$jeera', '$mohri', '$vegetables', '$fuel','$date','$month','$year','$class')";
    // $ab="INSERT INTO `report` (`rice`, `student`, `dal`, `salary`) VALUES ('$rice', '$student', '$dal', '$student')";
    $re=mysqli_query($conn,$abc);?>
    <form action="Areport.php" method="post">
    <select name="year"id="">
        <option value="2022">2022</option>
    </select>
    <select name="month" id="">
        <option value="December">December</option>
    </select>
    <input type="submit" value="sub" name="sub">
    </form><?php
    // header("Location: Areport.php");   
    
    // echo   "<!DOCTYPE html>
    // <html>
    // <head>
    // <link rel='stylesheet' type='text/css' href='mdmstyle.css'>
    // </head>
    // <body>
    // <header>
      
        
    // <!-- <p>To center an image, set left and right margin to auto, and make it into a block element.</p> -->
    // <main style=' hight: 19vh';>
	// 	<section>
	// 		<h3>Welcome To Mid Day Meal Web portal</h3>
	// 		<h1>Daily  report<span class='change_content'> </span> <span style='margin-top: -10px;'>  </span> </h1>
	// 		<p>'अन्नं न परिचक्षीत । तद्व्रतम् ।
	// 			'</p>
	// 		<!-- <a href='#' class='btnone'>learn more</a>
	// 		<a href='#' class='btntwo'>signup here</a> -->
		
	// 	</section>
	// </main>

   
    // <div class='tab1'>
    //     <table style='width:70%'; class='mid'>
    //     <tr>
        
    //     <th>students</th>
    //     <th>class</th>
    //     <th>rice</th>
    //     <th>mug</th>
    //     <th>masoor</th>
    //     <th>tur</th>
    //     <th>matki</th>
    //     <th>harbara</th>
    //     <th>vatana</th>
    
    //     </tr>
    //     <tr>
    //     <td>$student</td>
    //     <td>$class</td>
    //     <td>$rice</td>
      
    //     <td>$mug</td>
    //     <td>$masoor</td>
    //     <td>$tur</td>
    //     <td>$matki</td>
    //     <td>$harbara</td>
        
    //     <td>$vatana</td>
        
    //     </tr>
           
    //     </table>
    // </div>
    
    // </header>
    
    // </body>
    // </html>";
    // real table code






    // echo"<table border='1'>
    // <tr>
    // <th>rice</th>
    // <th>students</th>
    // <th>dal</th>
    // <th>salary</th>
    
    // </tr>
    // <tr>
    // <td>$rice</td>
    // <td>$student</td>
    // <td>$dal</td>
    // <td>$salary</td>
    // </tr>
    
    
    // </table>";
}