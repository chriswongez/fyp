<head>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<?php
session_start();
include_once("./templates/top.php");
include("../php/dbconnect.php");

if (isset($_POST['promote'])) {
    $userID = $_POST['promote'];
    $query = "UPDATE users SET userlevel = 'admin' WHERE userID = '$userID' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
        alert('" . $userID . " is promoted to admin');
        </script>";
    }
} else if (isset($_POST['demote'])) {
    $userID = $_POST['demote'];
    $query = "UPDATE users SET userlevel = 'user' WHERE userID = '$userID' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
        alert('" . $userID . " is demoted to user');
        </script>";
    }
}

if (isset($_POST['block'])) {
    $userID = $_POST['block'];
    echo $query = "UPDATE users SET isBlock = '1' WHERE userID = '$userID' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
        alert('" . $userID . " is blocked');
        </script>";
    }
} else if (isset($_POST['unblock'])) {
    $userID = $_POST['unblock'];
    $query = "UPDATE users SET isBlock = '0' WHERE userID = '$userID' ";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
        alert('" . $userID . " is unblocked');
        </script>";
    }
}
?>
<div class="container-fluid">
    <div class="row">

        <?php include("./Adminnavbar.php")
        ?>


        <div class="row">
            <div class="col-10">
                <h2><i class="fas fa-users"></i> User Management</h2>
            </div>

        </div>
        <div class="row">

            <div class="col">

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">User ID</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">User Level</th>
                                <th class="text-center">Action</th>
                                <!-- action promote, block, remove-->

                            </tr>
                        </thead>
                        <tbody id="customer_list">
                            <form method="post">
                                <?php
                                $query = ("SELECT * FROM `users` ");
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['isBlock'] == 0) {
                                        echo "<tr>";
                                    } else if ($row['isBlock'] == 1) {
                                        echo "<tr style='background-color:red'>";
                                    }
                                    echo "<td class='align-middle text-center'>" . $row['userID'] . "</td>
                        <td class='align-middle text-center'>" . $row['username'] . "</td>
                        <td class='align-middle text-center'>" . $row['useremail'] . "</td>
                        <td class='align-middle text-center'>" . $row['usercontact'] . "</td>
						<td class='align-middle text-center'>" . $row['userlevel'] . "</td>";
                                    if ($row['userID'] != 1) {
                                        echo "<td class='align-middle text-center'>";
                                        if ($row['userlevel'] == "user" && $row['isBlock'] == 0)
                                            echo "<button value='" . $row['userID'] . "' type='submit' name='promote' class='btn btn-sm btn-info'>Promote</button>";
                                        else if ($row['userlevel'] == "admin" && $row['isBlock'] == 0)
                                            echo "<button value='" . $row['userID'] . "' type='submit' name='demote' class='btn btn-sm btn-info'>Demote</button>";
                                        if ($row['isBlock'] == 0) {
                                            echo "<button value='" . $row['userID'] . "' type='submit' name='block' class='btn btn-sm btn-danger'>Block</button>";
                                        } else if ($row['isBlock'] == 1) {
                                            echo "<button value='" . $row['userID'] . "' type='submit' name='unblock' class='btn btn-sm btn-danger'>Unblock</button>";
                                        }
                                        echo "</td>";
                                    } else
                                        echo "<td></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-light border rounded p-2">
                <h4>Instruction for admin</h4>
                <p>
                    "Promote" button:
                    <br> - Promote user to Admin<br>
                    "Deomote" button:
                    <br> - Demote user to Normal Customer<br>
                    "Block" button:
                    <br> - Block user or admin. They can't login once blocked.<br>
                    "Unblock" button:
                    <br> - Unblock user or admin.<br>
                </p>
            </div>
        </div>
        </main>
    </div>
</div>

<?php include_once("./templates/footer.php"); ?>

<script type="text/javascript" src="./js/customers.js"></script>