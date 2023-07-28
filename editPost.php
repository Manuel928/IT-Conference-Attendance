<?php
require_once 'db/conn.php';



if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST["first-name"];
    $lname = $_POST["last-name"];
    $dob = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $contactNum = $_POST["contactNumber"];
    $speciality = $_POST["speciality"];

    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contactNum, $speciality);

    if (!$result) {
        include 'includes/errormessage.php';
    }
}
?>

<br>
<br>
<br>
<br>
<br>




<?php
require_once 'includes/footer.php';
?>