<?php 
    $title = 'Success'; 
    require_once 'includes/header.php'; 
    require_once 'db/connection.php';

    if(isset($_POST['submit'])){
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $dob = $_POST['dob'];
          $email = $_POST['email1'];
          $phone = $_POST['phone'];
          $specialty = $_POST['specialty'];
          //call function to be inserted and track if successful or not
          $isSuccess = $crud->insert($fname,$lname,$dob,$email,$phone,$specialty);

          if ($isSuccess){
             //  echo  '<h1 class="text-center text-success">Registration Successfull!</h1>';
             include 'includes/successmessage.php';
 
          } else {
                //echo '<h1 class="text-center text-danger">There was an error in processing</h1>';
                include 'includes/errormessage.php';

                
          }
    }
    
    ?>

    <!-- <h1 class="text-center text-success">Registration Successfull!</h1>
    <h1 class="text-center text-success">Thank You!</h1>
 -->
   <!--  <div class="card text-center">
  <div class="card-body">
        <h5 class="card-title"><?php// echo $_GET['firstname'] . ' ' . $_GET['lastname'];?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty'];?></h6>
        <p class="card-text">Date of Birth: <?php //echo $_GET['dob'];?></p>
        <p class="card-text">Email Address: <?php //echo $_GET['email1'];?></p>
        <p class="card-text">Phone Number: <?php //echo $_GET['phone'];?></p>
        
  </div>
    </div> -->
    <div class="card text-center">
  <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty'];?></h6>
        <p class="card-text">Date of Birth: <?php echo $_POST['dob'];?></p>
        <p class="card-text">Email Address: <?php echo $_POST['email1'];?></p>
        <p class="card-text">Phone Number: <?php echo $_POST['phone'];?></p>
        
  </div>
    </div>
    <?php 
         



    ?>
<br/>
<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>
