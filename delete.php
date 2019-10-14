<?php
       require_once 'db/connection.php';
       if(!$_GET['id']){
           //echo 'error';
           include 'includes/errormessage.php';

       }else {
           $id = $_GET['id'];

           //call delete function
           $result = $crud->deleteAttendee($id);
           //redirect to list
           if($result) {
               header("Location: viewrecords.php");
           }else{
              // echo 'error';
              include 'includes/errormessage.php';

           }
       }



?>