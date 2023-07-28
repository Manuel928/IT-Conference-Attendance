<?php
$title = "View Attendees";
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getAttendees();

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Speciality ID</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <!-- Modal -->
            <div class="modal fade" id="deleteConfirm_<?php echo $r['attendee_id']; ?>" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteConfirmLabel">Are you sure you want to delete this record?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- card -->
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> Full Name: <?php echo $r['firstname'] . ' ' . $r['lastname']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="delete.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <tr>
                <td><?php echo $r['attendee_id']; ?></td>
                <td><?php echo $r['firstname']; ?></td>
                <td><?php echo $r['lastname']; ?></td>
                <td><?php echo $r['name']; ?></td>
                <td>
                    <div class="d-flex flex-column justify-content-around mb-1 mt-1 row gy-3 mx-1">
                        <a href="view.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-dark p-2">View</a>
                        <a href="edit.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-warning p-2">Edit</a>
                        <a href="delete.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#deleteConfirm_<?php echo $r['attendee_id']; ?>">
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>