<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Contact Us</title>
</head>


<?php session_start();
include("../php/dbconnect.php");
include_once("./templates/top.php");

if (isset($_POST['changestatus'])) {
    if ($_POST['changestatus'] == "reply") {
        $id = $_POST['id'];
        $query = "UPDATE contact_us SET cuStatus = '1' where cuID = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('The status has been changed to Replied')</script>";
        }
    } else if ($_POST['changestatus'] == "xreply") {
        $id = $_POST['id'];
        $query = "UPDATE contact_us SET cuStatus = '0' where cuID = '$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('The status has been changed to Haven\'t reply yet')</script>";
        }
    }
}
?>

<body>
    <div class="container-fluid">
        <div class="row">


            <?php include("./Adminnavbar.php")
            ?>


            <div class="row">
                <div class="col-10">
                    <h2><i class="fas fa-paper-plane"></i> Contact Us</h2>
                    <span>
                        Note: Staff have to reply to customer by their email and change the status here once replied.
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <?php
                        $query = "SELECT * from contact_us order by cuID desc";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['cuID']; ?></td>
                                <td><?php echo $row['cuName']; ?></td>
                                <td><?php echo $row['cuEmail']; ?></td>
                                <td><?php echo $row['cuPhone']; ?></td>
                                <?php
                                $message = nl2br($row['cuMessage']);
                                $message = str_replace(array("\n", "\r"), '', $message);
                                ?>
                                <td><a class='btn btn-sm btn-info' data-toggle='modal' data-target='#view_message_modal' onclick="message('<?php echo $message; ?>')">Click to view massage</a></td>
                                <td>
                                    <?php
                                    if ($row['cuStatus'] == 0) {
                                        echo '<span style="color: red;">Haven\'t reply yet</span>';
                                        $changestatus = "reply";
                                        $btntt = 'Change to Replied';
                                    } else if ($row['cuStatus'] == 1) {
                                        echo '<span style="color: Green;">Replied</span>';
                                        $changestatus = "xreply";
                                        $btntt = 'Change to Haven\'t reply yet';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $row['cuID']; ?>" name="id">
                                        <button class="btn btn-sm btn-info" title="<?php echo $btntt ?>" value="<?php echo $changestatus ?>" name="changestatus" type="submit">Change</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>
</body>

<div class="modal fade" id="view_message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="row">
                        <div class="col" id="message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
<?php include_once("./templates/footer.php"); ?>

<script>
    function message(msg) {
        console.log(msg);
        document.getElementById("message").innerHTML = msg;
    }
</script>