<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['obcsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $vid = $_GET['viewid'];
        $bookingid = $_GET['bookingid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        $sql = "UPDATE tblapplication SET HStatus=:status, Remark=:remark WHERE ID=:vid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':remark', $remark, PDO::PARAM_STR);
        $query->bindParam(':vid', $vid, PDO::PARAM_STR);

        $query->execute();

        echo '<script>alert("Remark has been updated")</script>';
        echo "<script>window.location.href ='all-applications.php'</script>";
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Manage Application Form | Online Birth Certificate System</title>

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- data table CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">

    <div class="wrapper-pro">
        <?php include_once('includes/sidebar.php'); ?>
        <?php include_once('includes/header.php'); ?>

        <!-- Breadcome start-->
        <div class="breadcome-area mg-b-30 small-dn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcome-list shadow-reset">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Birth Application Form</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcome End-->

        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline13-list shadow-reset">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>View <span class="table-project-n">Detail of Birth</span> Application</h1>
                                    <div class="sparkline13-outline-icon">
                                        <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                        <span><i class="fa fa-wrench"></i></span>
                                        <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

                                    <?php
                                    $vid = $_GET['viewid'];

                                    $sql = "SELECT tblapplication.*, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Address FROM  tblapplication JOIN tbluser ON tblapplication.UserID=tbluser.ID WHERE tblapplication.ID=:vid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                    ?>
                                            <table border="1" class="table table-bordered">
                                                <tr align="center">
                                                    <td colspan="4" style="font-size:20px;color:blue">
                                                        User Details</td>
                                                </tr>
                                                <tr align="center">
                                                    <td colspan="4" style="font-size:20px;color:red">
                                                        Application Number: <?php echo $row->ApplicationID; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>First Name</th>
                                                    <td><?php echo $row->FirstName; ?></td>
                                                    <th scope>Last Name</th>
                                                    <td><?php echo $row->LastName; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>Mobile Number</th>
                                                    <td><?php echo $row->MobileNumber; ?></td>
                                                    <th>Address</th>
                                                    <td><?php echo $row->Address; ?></td>
                                                </tr>
                                                <tr align="center">
                                                    <td colspan="4" style="font-size:20px;color:blue">
                                                        Application Details</td>
                                                </tr>
                                                <tr>
                                                    <th scope>Date of apply</th>
                                                    <td colspan="3"><?php echo $row->Dateofapply; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>Full Name</th>
                                                    <td><?php echo $row->FullName; ?></td>
                                                    <th scope>Gender</th>
                                                    <td><?php echo $row->Gender; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>Date of Birth</th>
                                                    <td><?php echo $row->DateofBirth; ?></td>
                                                    <th scope>Place of Birth</th>
                                                    <td><?php echo $row->PlaceofBirth; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>Name of Mother</th>
                                                    <td><?php echo $row->NameOfMother; ?></td>
                                                    <th scope>Name of Father</th>
                                                    <td><?php echo $row->NameofFather; ?></td>

                                                </tr>
                                                <tr>
                                                    <th scope>Mother's Aadhar Number</th>
                                                    <td><?php echo $row->MotherAadharNumber; ?></td>
                                                    <th scope>Father's Aadhar Number</th>
                                                    <td><?php echo $row->FatherAadharNumber; ?></td>

                                                </tr>
                                                <tr>
                                                    <th scope>Hospital Name</th>
                                                    <td><?php echo $row->HospitalName; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope>Permanent Address</th>
                                                    <td><?php echo $row->PermanentAdd; ?></td>
                                                    <th scope>Postal Address</th>
                                                    <td><?php echo $row->PostalAdd; ?></td>

                                                </tr>
                                                <tr>
                                                    <th scope>Mobile Number</th>
                                                    <td><?php echo $row->MobileNumber; ?></td>
                                                    <th scope>Email</th>
                                                    <td><?php echo $row->Email; ?></td>

                                                </tr>
                                                <tr>
                                                    <th scope>Remark</th>
                                                    <?php if ($row->Remark == "") : ?>

                                                        <td><?php echo "Your application is still pending"; ?></td>
                                                    <?php else : ?> <td><?php echo htmlentities($row->Remark); ?>
                                                        </td>
                                                    <?php endif; ?>
                                                    <th scope>Status</th>
                                                    <?php if ($row->Status == "") : ?>

                                                        <td><?php echo "Pending"; ?></td>
                                                    <?php else : ?> <td><?php echo htmlentities($row->Status); ?>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>

                                            </table>
                                            <tr>

                                                <th>Order Final Status</th>

                                                <td> <?php $status = $row->Status;

                                                        if ($row->Status == "Verified") {
                                                            echo "Your application has been verified";
                                                        }

                                                        if ($row->Status == "Rejected") {
                                                            echo "Your application has been cancelled";
                                                        }

                                                        if ($row->Status == "") {
                                                            echo "Pending";
                                                        }


                                                        ; ?></td>
                                                <th>Admin Remark</th>

                                                <?php if ($row->Status == '') : ?>
                                                    <form method="post" name="submit">
                                                        <tr>
                                                            <th>Status :</th>
                                                            <td>
                                                                <select name="status" class="form-control wd-450" required="true">
                                                                    <option value="HVerified">HVerified</option>
                                                                    <option value="HRejected">HRejected</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Admin Remark :</th>
                                                            <td>
                                                                <textarea name="remark" class="form-control wd-450" required="true"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align: center;">
                                                                <button type="submit" name="submit" class="btn btn-success">Submitt</button>
                                                                <!-- <button type="submit" name="submit" class="btn btn-danger">Reject</button> -->
                                                            </td>
                                                        </tr>
                                                    </form>
                                                <?php endif; ?>
                                    <?php
                                            $cnt = $cnt + 1;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <?php if ($status == "hospital") : ?>
            <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="post" name="submit">
                    <tr>
                        <th>Status :</th>
                        <td>
                            <select name="status" class="form-control wd-450" required="true">
                                <option value="HVerified" selected="true">HVerified</option>
                                <option value="HRejected">HRejected</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Admin Remark :</th>
                        <td>
                            <textarea name="remark" class="form-control wd-450" required="true"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </td>
                    </tr>
                </form>
            </div>

            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="post" name="submit">
                    <tr>
                        <th>Status :</th>
                        <td>
                            <select name="status" class="form-control wd-450" required="true">
                                <option value="HVerified">HVerified</option>
                                <option value="HRejected" selected="true">HRejected</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Admin Remark :</th>
                        <td>
                            <textarea name="remark" class="form-control wd-450" required="true"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </td>
                    </tr>
                </form>
            </div>
        <?php endif; ?>
    </div>
  <?php include_once('includes/footer.php');?>
   
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>


</body>

</html>
