<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['obcsuid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $uid = $_SESSION['obcsuid'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $fname = $_POST['fname'];
        $pob = $_POST['pob'];
        $mname = $_POST['nameofmother'];
        $fathername = $_POST['nameoffather'];
        $padd = $_POST['padd'];
        $postaladd = $_POST['postaladd'];
        $mobnumber = $_POST['mobnumber'];
        $email = $_POST['email'];
        $appnumber = mt_rand(100000000, 999999999);
        $bd_Id = 2; // Set default value to 2

        $motheraadhar = $_POST['motheraadhar'];
        $fatheraadhar = $_POST['fatheraadhar'];
        $hospitalname = $_POST['hospitalName'];

        // Retrieve hospital ID based on the selected hospital name
        $sqlHospitalId = "SELECT id FROM tblhospital WHERE HospitalName = :hospitalname";
        $queryHospitalId = $dbh->prepare($sqlHospitalId);
        $queryHospitalId->bindParam(':hospitalname', $hospitalname, PDO::PARAM_STR);
        $queryHospitalId->execute();
        $hospitalId = $queryHospitalId->fetchColumn();

        $ret = "SELECT DateofDeath FROM tblapplication WHERE DateofDeath = :dob AND NameofFather = :fname";
        $query = $dbh->prepare($ret);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() == 0) {
            $sql = "INSERT INTO tblapplication(UserID, bd_Id, ApplicationID, DateofDeath, Gender, FullName, PlaceofBirth, NameOfMother, NameofFather, PermanentAdd, PostalAdd, MobileNumber, Email, MotherAadharNumber, FatherAadharNumber, HospitalName, H_id) 
                    VALUES(:uid, :bd_Id, :appnumber, :dob, :gender, :fname, :pob, :mname, :fathername, :padd, :postaladd, :mobnumber, :email, :motheraadhar, :fatheraadhar, :hospitalname, :hospitalId)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uid', $uid, PDO::PARAM_STR);
            $query->bindParam(':bd_Id', $bd_Id, PDO::PARAM_INT);
            $query->bindParam(':appnumber', $appnumber, PDO::PARAM_STR);
            $query->bindParam(':dob', $dob, PDO::PARAM_STR);
            $query->bindParam(':gender', $gender, PDO::PARAM_STR);
            $query->bindParam(':fname', $fname, PDO::PARAM_STR);
            $query->bindParam(':pob', $pob, PDO::PARAM_STR);
            $query->bindParam(':mname', $mname, PDO::PARAM_STR);
            $query->bindParam(':fathername', $fathername, PDO::PARAM_STR);
            $query->bindParam(':padd', $padd, PDO::PARAM_STR);
            $query->bindParam(':postaladd', $postaladd, PDO::PARAM_STR);
            $query->bindParam(':mobnumber', $mobnumber, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':motheraadhar', $motheraadhar, PDO::PARAM_STR);
            $query->bindParam(':fatheraadhar', $fatheraadhar, PDO::PARAM_STR);
            $query->bindParam(':hospitalname', $hospitalname, PDO::PARAM_STR);
            $query->bindParam(':hospitalId', $hospitalId, PDO::PARAM_INT);

            $query->execute();
            $LastInsertId = $dbh->lastInsertId();

            if ($LastInsertId > 0) {
                echo '<script>alert("Death Certificate applied successfully")</script>';
                echo "<script>window.location.href ='manage-forms.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        } else {
            echo "<script>alert('Date of Birth and Father Name is already exist. Please try again');</script>";
        }
    }

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Birth Certificate Form | Online Birth Certificate System</title>
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
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
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
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
   <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
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
                                            <li><span class="bread-blod">Death Registration Form</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- Basic Form Start -->
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Application Form</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    
                                                    <form method="post">
                                                    <div class="form-group-inner">
    <div class="row">
        <div class="col-lg-3">
            <label class="login2 pull-right pull-right-pro">Hospital Name</label>
        </div>
        <div class="col-lg-9">
            <select class="form-control" required="true" name="hospitalName">
                <?php
                // Fetch hospital names from tblhospital table
                $sqlHospital = "SELECT * FROM tblhospital";
                $queryHospital = $dbh->prepare($sqlHospital);
                $queryHospital->execute();
                $resultHospital = $queryHospital->fetchAll(PDO::FETCH_ASSOC);

                // Loop through results and create options for the dropdown
                foreach ($resultHospital as $hospital) {
                    echo "<option value='" . $hospital['HospitalName'] . "'>" . $hospital['HospitalName'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Date of Death</label>
                                                                </div>
                                                                <div class="col-lg-9">

                                                                    <input type="date" class="form-control" name="dob" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                                                                    <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Gender</span></label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                                                                    <div class="bt-df-checkbox">
                                                                       <p style="text-align: left;"> <input type="radio"  name="gender" id="gender" value="Female" checked="true">Female</p>
             
                                                                   <p style="text-align: left;"> <input type="radio" name="gender" id="gender" value="Male">Male</p>
             
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Full Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="fname" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Place of Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="pob" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Full Name of Mother</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="nameofmother" />
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Full Name of Father</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="nameoffather" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Mother's Aadhar Number</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="motheraadhar" value="" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Father's Aadhar Number</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="fatheraadhar" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Permanent Address</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <textarea type="text" class="form-control" name="padd" value="" required="true" /></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Postal Address</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <textarea type="text" class="form-control" name="postaladd" value="" required="true"/></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Contact Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <input type="text" class="form-control" required="true" value="" name="mobnumber" maxlength="10" pattern="[0-9]+" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Email</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="email" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                               
                                                    
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Add Details</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->

        </div>
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
    <!-- modal JS
		============================================ -->
    <script src="js/modal-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html><?php }  ?>