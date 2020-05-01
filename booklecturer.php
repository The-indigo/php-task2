
<?php include_once('lib/header.php');  
require_once('functions/alert.php');

 if(!isset($_SESSION['loggedIn'])){
     header("Location:login.php");
     }

?>
<div class="container">
<div class="row col-6">
<h3>Book A Lecturer</h3>
</div>
    <hr>
    <div class="row col-6">
    <p><strong> All fields are required</strong></p>
</div>
<div class="row col-6">
    <form method="POST" action="processbook.php">
    <p>
          <?php print_alert();  unset($_SESSION['error']);   ?>
    </p>
    <p>

     <label>First Name</label>
    <input
    <?php
         if(isset($_SESSION['firstname'])){
                  echo "value=". $_SESSION['firstname'];
               }
          ?>
     type="text" class="form-control" name="firstname" id="firstname" readonly required>
    </p>

    <p>

<label>Last Name</label>
<input
<?php
    if(isset($_SESSION['lastname'])){
              echo "value=". $_SESSION['lastname'];
           }
      ?>
 type="text" class="form-control" name="lastname" id="lastname" readonly required >
</p> 

<p>
    <label>Email</label>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" class="form-control" name="email" id="email" readonly required>
    </p>


    <p>
    <label>Date of Appointment</label>
    <input 
     
          type="date" class="form-control" name="appointmentdate" id="appointmentdate">
    </p>

    <p>
    <label>Time of Appointment</label>
    <input 
    
          type="time" class="form-control" name="appointmenttime" id="appointmenttime"  >
    </p>

    <p>

    <label>Nature Of Appointment</label>
    <input 
    <?php
              if(isset($_SESSION['nature'])){
                  echo "value=".$_SESSION['nature'];
              }
          ?>
    type="text" class="form-control" name="nature" id="nature" placeholder="Nature of Appointment" >
    </p>

    <label>Initial Complaint</label>
    <input 
    <?php
              if(isset($_SESSION['complaint'])){
                  echo "value=".$_SESSION['complaint'];
              }
          ?>
    type="textarea" class="form-control" name="complaint" id="complaint" placeholder="Complaints" >
    </p>

   

    <p>
    <label>Department to book the appointment for </label>
    <select class="form-control" name="dept" id="dept" >
    <?php
              if(isset($_SESSION['dept'])){
                  echo "value=".$_SESSION['dept'];
              }
          ?>
    <option value="">Select One</option>
        <option
        <?php
              if(isset($_SESSION['dept']) && $_SESSION['dept']=='Ict'){
                  echo "selected";
              }
          ?>
        > Ict</option>

        <option
        <?php
              if(isset($_SESSION['dept']) && $_SESSION['dept']=='Accounting'){
                  echo "selected";
              }
          ?>
        >Accounting</option>

        <option
        <?php
              if(isset($_SESSION['dept']) && $_SESSION['dept']=='Finance'){
                  echo "selected";
              }
          ?>
        >Finance</option>

        <option
        <?php
              if(isset($_SESSION['dept']) && $_SESSION['dept']=='Agriculture'){
                  echo "selected";
              }
          ?>
        >Agriculture</option>

        <option
        <?php
              if(isset($_SESSION['dept']) && $_SESSION['dept']=='Education'){
                  echo "selected";
              }
          ?>
        >Education</option>
    </select>
    </p>

<hr>

<p>
<button class="btn btn-success" type='submit'>Submit</button>
</p>


    </form>
</div>
   
</div>
    <?php
  include_once('lib/footer.php');  

?>