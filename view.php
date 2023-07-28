<?php
$title = "View Record";
require_once 'db/conn.php';

if (!isset($_GET['id'])) {
    include 'includes/nomatches.php';
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Attendance - <?php echo $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="../css/site.css">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-3">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">IT Conference</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="viewrecords.php">View Attendees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view.php?id=<?php echo $result['attendee_id']; ?>">View Record</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>

            <div class="card mb-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> Full Name: <?php echo $result["firstname"] . ' ' . $result["lastname"]; ?></h5>
                    <h5 class="card-title mb-2"> Speciality: <?php echo $result['name']; ?></h5>
                    <h5 class="card-title"> Date of Birth: <?php echo $result["dateOfBirth"]; ?></h5>
                    <h6 class="card-title mb-2"> Email: <?php echo $result['email']; ?></h6>
                    <p class="card-text"> Contact Number: <?php echo $result['contactNumber']; ?></p>
                </div>
            </div>

            <div class="g-5 my-2">
                <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirm">
                    Delete
                </a>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteConfirm" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteConfirmLabel">Are you sure you want to delete?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- card -->
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Record: <?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="delete.php?id=<?php echo $result['attendee_id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <br>
        <br>
        <br>
        <br>
        <br>


        <div id="footer">
            <?php echo 'Copyright &copy 2020 - ' . date("Y"); ?>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script>
            $(function() {
                $("#dateOfBirth").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+0",
                    dateFormat: "yy-mm-dd",
                });
            });
        </script>
    </body>

    </html>