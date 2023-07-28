<?php
$title = "Success";
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $fname = $_POST["first-name"];
    $lname = $_POST["last-name"];
    $dob = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $contactNum = $_POST["contactNumber"];
    $speciality = $_POST["speciality"];

    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contactNum, $speciality);

    if ($isSuccess) {
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}

?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"> Full Name: <?php echo $_POST["first-name"] . ' ' . $_POST["last-name"]; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"> Area of Expertise: <?php echo $_POST['speciality']; ?></h6>
        <p class="card-text"> Date of Birth: <?php echo $_POST['dateOfBirth']; ?></p>
        <p class="card-text">Email: <?php echo $_POST['email']; ?></p>
        <p class="card-text"> Contact Number: <?php echo $_POST['contactNumber']; ?></p>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>



<?php
require_once 'includes/footer.php';
?>