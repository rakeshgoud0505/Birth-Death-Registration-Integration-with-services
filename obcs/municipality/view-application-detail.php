<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Check if the user is logged in
if (strlen($_SESSION['obcsaid']) == 0) {
    header('location:logout.php');
} else {
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $vid = $_GET['viewid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        // Update the database with the new status and remark
        $sql = "UPDATE tblapplication SET Status=:status, Remark=:remark WHERE ID=:vid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':remark', $remark, PDO::PARAM_STR);
        $query->bindParam(':vid', $vid, PDO::PARAM_STR);

        // Execute the query
        $query->execute();

        // Display a success message and redirect to the application list page
        echo '<script>alert("Remark has been updated")</script>';
        echo "<script>window.location.href ='all-applications.php'</script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Manage Application Form | Online Birth Certificate System</title>

    <!-- Google Fonts ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS ============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS ============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS ============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">

    <div class="wrapper-pro">
        <?php include_once('includes/sidebar.php'); ?>
        <?php include_once('includes/header.php'); ?>

        <!-- Breadcome start -->
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
                                        <li><span class="bread-blod">Application Form</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcome End -->

        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline13-list shadow-reset">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>View <span class="table-project-n">Detail of</span> Application</h1>
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
                                    $sql = "SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ID=:vid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                    ?>
                                            <table border="1" class="table table-bordered">
                                                <!-- Rest of your HTML code for displaying application details remains unchanged -->

                                                <?php if ($row->Status == 'hospital') : ?>
                                                    <!-- Display the button to open the modal -->
                                                    <p align="center" style="padding-top: 20px">
                                                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button>
                                                    </p>
                                                <?php endif; ?>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-hover data-tables">
                                                                    <form method="post" name="submit">
                                                                    <tr>
   <!-- Add this section inside your existing PHP foreach loop where you are displaying application details -->
<tr>
    <th>HStatus :</th>
    <td>
        <textarea name="HStatus" placeholder="HStatus" rows="6" cols="14" class="form-control wd-450" readonly><?php echo htmlentities($row->HStatus);?></textarea>
    </td>
</tr>


                                                                        <tr>
                                                                            <th>Remark :</th>
                                                                            <td>
                                                                                <textarea name="remark" placeholder="Remark" rows="6" cols="14" class="form-control wd-450" required="true"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Status :</th>
                                                                            <td>
                                                                                <select name="status" class="form-control wd-450" required="true">
                                                                                    <option value="HVerified" selected="true">HVerified</option>
                                                                                    <option value="HRejected">HRejected</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                    <?php
                                        }
                                    }
                                    ?>

                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
    </div>
    </div>

    <?php include_once('includes/footer.php'); ?>

    <!-- jquery ============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS ============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS ============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- data table JS ============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS ============================================ -->
    <script src="js/main.js"></script>

</body>

</html>
