<?php

class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAttendees($fname, $lname, $dob, $email, $contactNum, $speciality)
    {
        try {
            $sql = "INSERT INTO attendee (firstname, lastname, dateOfBirth, email, contactNumber, speciality_id) VALUES(:fname,:lname,:dob,:email,:contactNum,:speciality_id)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contactNum', $contactNum);
            $stmt->bindparam(':speciality_id', $speciality);

            $stmt->execute();
            return true;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
    public function editAttendee($id, $fname, $lname, $dob, $email, $contactNum, $speciality)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstname`=:fname, `lastname`=:lname, `dateOfBirth`=:dob, `email`=:email, `contactNumber`=:contactNum, `speciality_id`=:speciality WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contactNum', $contactNum);
            $stmt->bindparam(':speciality', $speciality);

            $stmt->execute();
            return true;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public function deleteNote($id)
    {
        try {
            $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        try {
            $sql = "SELECT * FROM `attendee` a INNER JOIN specialities s ON a.speciality_id = s.speciality_id ORDER BY a.speciality_id ASC;";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM `attendee` a INNER JOIN specialities s ON a.speciality_id = s.speciality_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
    public function getSpecialities()
    {
        try {
            $sql = "SELECT * FROM specialities;";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
