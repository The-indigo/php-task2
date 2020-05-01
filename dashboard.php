<?php
include_once('lib/header.php');  
require_once('functions/alert.php');
if(!isset($_SESSION['loggedIn'])){
  header("Location:login.php");
}
?>

<div class="container">
<div class="row col-6">
<h3>Welcome</h3>

</div>
<hr>
<p>
<?php  echo $_SESSION['loggedIn'];?> 
</P>
<p>
          <?php print_alert(); unset($_SESSION['message']); unset($_SESSION['error']);  ?>
    </p>
<div class="row col-6">

<p>
You are logged in as a <?php echo $_SESSION['role'];?>
</p>

<p>
Date Of Registration:<?php echo $_SESSION['dateReg'];?>
</p>

<p>
 Last Logged in: <?php echo $_SESSION['lastLogin'] ?> 
</p>

<p>
 <?php
if(isset($_SESSION['role']) && $_SESSION['role']=="Student"){
  echo "<br>";
  echo "<a href='paybill.php'>Pay Bill</a>"; 
 
  echo "<br>";
  echo "<a href='booklecturer.php'>Book Lecturer</a>";

}
?>
</p>

<p>
 <?php
  if(isset($_SESSION['role']) && $_SESSION['role']=="Staff"){
 
  echo '<h4>Your Appointments</h4>';
  $files = array_diff(scandir("db/appointments/"), array('.', '..'));
                        
foreach ($files as $file) {
    $data = file_get_contents("db/appointments/".$file);  
      $details=json_decode($data);

      if(isset($_SESSION['department']) && $_SESSION['department'] == $details->Department){
     
       echo '<table class="table">';
      echo "<thead>";
     
      
      echo "<tr><th scope='col'>Student Name</th> <th scope='col'>Date of appointment</th>
       <th scope='col'>Nature of appointment</th>
       <th scope='col'> initial complaint</th>
       </tr>";
      "</thead>";
   "<tbody>";
  echo "<tr> <td>$details->First_Name $details->Last_Name.</td>
  <td>$details->Date.</td><td>$details->Nature.</td>
  <td>$details->Complaint.</td></tr>";
   
  echo "</tbody>";
echo "</table>";           
    }
  
   
}
if ($_SESSION['department']!= $details->Department){
  echo"<p>";
  echo "<p>You have no appointment</P>";
  echo"</p>";
}
 
 }
?> 


</p>

</div>
</div>

