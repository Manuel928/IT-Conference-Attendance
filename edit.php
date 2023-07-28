<?php
$title = "Edit Record";
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialities();

if (!isset($_GET['id'])) {
    include 'includes/nomatches.php';
} else {
    $id = $_GET['id'];
    $attendeeDetails = $crud->getAttendeeDetails($id);

?>
    <h1 class="text-center">Edit Record</h1>


    <form method="POST" action="editPost.php">
        <input type="hidden" name="id" value="<?php echo $attendeeDetails['attendee_id']; ?>" />
        <div class="mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input type="name" class="form-control" value="<?php echo  $attendeeDetails['firstname'] ?>" id="first-name" name="first-name" aria-describedby="fname-help">
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last Name</label>
            <input type="name" class="form-control" value="<?php echo  $attendeeDetails['lastname'] ?>" id="last-name" name="last-name" aria-describedby="lname-help">
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">Date of birth</label>
            <input type="text" class="form-control" value="<?php echo  $attendeeDetails['dateOfBirth'] ?>" id="dateOfBirth" name="dateOfBirth">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of expertise</label>
            <select name="speciality" id="speciality" class="form-select" aria-label="Default select example">
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?php echo $r['speciality_id']; ?>" <?php if ($r['speciality_id'] == $attendeeDetails['speciality_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>
                    </option>

                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="<?php echo  $attendeeDetails['email'] ?>" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact number</label>
            <input type="text" class="form-control" value="<?php echo  $attendeeDetails['contactNumber'] ?>" id="contactNumber" name="contactNumber">
        </div>
        <div id="contactHelp" class="form-text">We'll never share your contact number with anyone else.</div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto" id="liveAlertPlaceholder"></div>
        <button type="submit" name="submit" class="btn btn-success btn-block" id="liveAlertBtn">Save Changes</button>
        <!-- <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->

    </form>
<?php } ?>
<br>
<br>
<br>
<br>
<br>
<br>

<script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

    const alert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            alert('Record Successfully Updated!', 'success')
        })
    }
</script>
<?php require_once 'includes/footer.php'; ?>