    <?php
    $title = "Index";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialities();
    ?>
    <h1 class="text-center">Registration For IT Conference</h1>

    <form method="POST" action="success.php">
        <div class="mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input required type="name" class="form-control" id="first-name" name="first-name" aria-describedby="fname-help">
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last Name</label>
            <input required type="name" class="form-control" id="last-name" name="last-name" aria-describedby="lname-help">
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">Date of birth</label>
            <input required type="text" class="form-control" id="dateOfBirth" name="dateOfBirth">
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of expertise</label>
            <select name="speciality" id="speciality" class="form-select" aria-label="Default select example">
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name'] ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact number</label>
            <input type="text" class="form-control" id="contactNumber" name="contactNumber">
        </div>
        <div id="contactHelp" class="form-text">We'll never share your contact number with anyone else.</div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="submit" class="btn btn-dark btn-block">Submit</button>
        </div>

    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php require_once 'includes/footer.php'; ?>