<?php
    class crud{
        // private database object
        private $db;
        
        //constructor to initialize private variable to the databse connection
        function __construct($conn){
            $this->db = $conn;
        }
        
        //function to insert a new record into the attendee database
        public function insert($fname,$lname,$dob,$email,$contact,$specialty){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialtyid) 
                VALUES(:fname,:lname,:dob,:email,:contact,:specialty)";
                //prepare the sql statement for execution
                $statemnt =$this->db->prepare($sql);
                //bind all placeholders to the actual values
                $statemnt->bindparam(':fname',$fname);
                $statemnt->bindparam(':lname',$lname);
                $statemnt->bindparam(':dob',$dob);
                $statemnt->bindparam(':email',$email);
                $statemnt->bindparam(':contact',$contact);
                $statemnt->bindparam(':specialty',$specialty);

                //execute statement
                $statemnt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
            try{
            $sql = "UPDATE `attendee` SET `firstname`=:fname,
            `lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,
            `contactnumber`=:contact,`specialtyid`=:specialty WHERE attendee_id= :id";
             $statemnt =$this->db->prepare($sql);
             //bind all placeholders to the actual values
             $statemnt->bindparam(':id',$id);
             $statemnt->bindparam(':fname',$fname);
             $statemnt->bindparam(':lname',$lname);
             $statemnt->bindparam(':dob',$dob);
             $statemnt->bindparam(':email',$email);
             $statemnt->bindparam(':contact',$contact);
             $statemnt->bindparam(':specialty',$specialty);
             $statemnt->execute();
             return true;
            } catch 
                (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            
        }
        public function getAttendees(){
            try{
            $sql = "SELECT * FROM attendee a inner join specialties s on a.specialtyid = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        public function getAttendeeDetails($id){
            try {
            $sql = "SELECT * FROM attendee a inner join specialties s on a.specialtyid = s.specialty_id 
            WHERE attendee_id =:id";
            $statemnt = $this->db->prepare($sql);
            $statemnt->bindparam(':id', $id);
            $statemnt->execute();
            $result = $statemnt->fetch();
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM attendee WHERE attendee_id = :id";
                $statemnt = $this->db->prepare($sql);
                $statemnt->bindparam(':id', $id);
                $statemnt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }

        }
        public function getSpecialties(){
            try{
            $sql = "SELECT * FROM specialties";
            $result = $this->db->query($sql);
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
    }
        
    }
?>