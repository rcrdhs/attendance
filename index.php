<?php 
    $title = 'Index'; 
    require_once 'includes/header.php'; 
    require_once 'db/connection.php';

      $results = $crud->getSpecialties();
    ?>
    <!-- 
        (What form should collect)
        -first name
        -last name
        -date of birth
        -speciality
        -email address
        -contact number
     -->
<h1 class='text-center'>Resistration for IT Conference</h1>

<form method="post" action ="success.php">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" >
  </div>
  <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
  </div>
  <div class="form-group">
        <label for="specialty">Area of Specialization</label>
        <select class="form-control" id="specialty" name="specialty">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name'];?></option>
            <?php }?>
    </select>
  </div>
  <div class="form-group">
        <label for="email1">Email address</label>
        <input required type="email" class="form-control" id="email1" name="email1" 
        placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="phone" class="form-control" id="phone" name="phone">
        <small id="phonehelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
  </div>
        <button type="submit" name="submit" class="btn btn-danger btn-block">Submit</button>
</form>
<br/>
<br/>
<br/>

<?php require_once 'includes/footer.php'; ?>
