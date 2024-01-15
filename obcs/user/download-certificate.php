<?php
require('../tcpdf/tcpdf.php');

ob_start();

$con = mysqli_connect("localhost", "root", "", "obcsdb");
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}

$cid = intval($_GET['cid']);
$ret = mysqli_query($con, "SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ApplicationID='$cid'");

// Check if the query was successful and if there is a row
if ($ret && mysqli_num_rows($ret) > 0) {
    // Initialize $row after fetching the data
    $row = mysqli_fetch_array($ret);

    // Set your variables
    $name = $row['FirstName'] . ' ' . $row['LastName'];
    $course = 'TEST';  // Replace with the actual course
    $date = $row['Dateofapply'];  // Replace with the actual date

    // Create TCPDF object
    $pdf = new TCPDF('S', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Certificate of Completion');
    $pdf->SetSubject('Certificate of Completion');
    $pdf->SetKeywords('TCPDF, PDF, certificate, completion');

    // Set white background color
    $pdf->SetFillColor(255, 255, 255);

    // Add a page
    $pdf->AddPage();

    // Draw a rectangle to cover the entire page as a background
    $pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'F');

    // Add an online image
    $imageUrl = 'img/.jpg'; // Replace with the actual URL to your image
    $imageSize = array(210, 297); // Set the width and height of the image to A4 size
    $pdf->Image($imageUrl, 0, 0, $imageSize[0], $imageSize[1], 'JPG', '', '', false, 300);

    $pdf->SetFont('helvetica', '', 12);

    // Add your table content
    $pdf->writeHTML("
    <h2 style='text-align: center;'>
        " . (($row['bd_Id'] == 2) ? "Death Certificate Details" : "Birth Certificate Details") . "
    </h2>
");

$pdf->writeHTML("
<h4>Application / Certificate Number: " . $row['ApplicationID'] . "</h4>
<table align='center' border='1' width='70%' style='margin-top:50%;'>
    <tr>
        <th width='2px'>Full Name</th>
        <td width='2px'>" . $row['FullName'] . "</td>
    </tr>
    <!-- Add Mother's Aadhar Number -->
    <tr>
        <th>Mother's Aadhar Number</th>
        <td>" . $row['MotherAadharNumber'] . "</td>
    </tr>
    <!-- Add Father's Aadhar Number -->
    <tr>
        <th>Father's Aadhar Number</th>
        <td>" . $row['FatherAadharNumber'] . "</td>
    </tr>
    <!-- Add Hospital Name -->
    <tr>
        <th>Hospital Name</th>
        <td>" . $row['HospitalName'] . "</td>
    </tr>
    <tr>
        <th>Gender</th>
        <td>" . $row['Gender'] . "</td>
    </tr>
    <tr>
        <th>" . (($row['bd_Id'] == 2) ? "Date of Death" : "Date of Birth") . "</th>
        <td>" . (($row['bd_Id'] == 2) ? $row['DateofDeath'] : $row['DateofBirth']) . "</td>
    </tr>
    <tr>
        <th>Place of Birth</th>
        <td>" . $row['PlaceofBirth'] . "</td>
    </tr>
</table>
");

    $pdf->writeHTML("
        <table align='center' border='1' width='70%' style='margin-top:3%;'>
            <tr>
                <th width='2px'>Name of Mother</th>
                <td width='2px'>" . $row['NameOfMother'] . "</td>
            </tr>
            <tr>
                <th>Name of Father</th>
                <td>" . $row['NameofFather'] . "</td>
            </tr>
            <tr>
                <th>Permanent Address of Parents</th>
                <td>" . $row['PermanentAdd'] . "</td>
            </tr>
            <tr>
                <th>Postal Address Permanent Address of Parents</th>
                <td>" . $row['PostalAdd'] . "</td>
            </tr>
            <tr>
                <th>Parents Mobile Number</th>
                <td>" . $row['MobileNumber'] . "</td>
            </tr>
            <tr>
                <th>Parents Email</th>
                <td>" . $row['Email'] . "</td>
            </tr>
        </table>
    ");

    $pdf->writeHTML("
        <table align='center' border='1' width='70%' style='margin-top:3%;'>
            <tr>
                <th width='2px'>Certificate Number</th>
                <td width='2px'>" . $row['ApplicationID'] . "</td>
            </tr>
            <tr>
                <th>Apply Date</th>
                <td>" . $row['Dateofapply'] . "</td>
            </tr>
            <tr>
                <th>Issued Date</th>
                <td>" . $row['UpdationDate'] . "</td>
            </tr>
        </table>
    ");

    $pdf->writeHTML("
        <p align='center' style='margin-top:1%; font-size:2px;'>THIS IS A COMPUTER GENERATED CERTIFICATE.</p>
    ");

    // Output the PDF as a download
    $pdf->Output($row['FirstName'].'-'.$row['LastName'].'-'.'certificate.pdf', 'D');
} else {
    // Handle the case when the query did not return any results
    echo "Error: No data found for the given ApplicationID.";
}
?>
