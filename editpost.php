<?php

            require_once 'db/connection.php';

        if(isset($_POST['submit'])){

            $id = $_POST['id'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $dob = $_POST['dob'];
            $email = $_POST['email1'];
            $contact = $_POST['phone'];
            $specialty = $_POST['specialty'];

            //call crud function
            $result = $crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty);
            //redirect to 
            if(!$result){
               // echo 'error';
               include 'includes/errormessage.php';

               
            }else {
                header("Location: viewrecords.php");
            }

        }else{

           // echo 'error';
           include 'includes/errormessage.php';

        }



?>