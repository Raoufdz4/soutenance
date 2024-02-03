<?php
session_start();

$useremail=$_SESSION['email'];

include '../../config.php';

if (isset($_POST['case_name']) && !empty($_POST['case_name']) && isset($_POST['price_adseuro']) && !empty($_POST['price_adseuro']) && isset($_POST['cpc']) && !empty($_POST['cpc']) && isset($_POST['cpd']) && !empty($_POST['cpd'])) {

    $casename = strtolower($_POST['case_name']);
    $casecpc= $_POST['cpc'];
    $casecpd= $_POST['cpd'];
    $caseads= $_POST['price_adseuro'];

    $req="INSERT INTO cases (case_name,cpc,cpd,ads_euro,exchange_rate,cases_user) VALUES ('$casename','$casecpc','$casecpd','$caseads',230,'$useremail')";
    $res=mysqli_query($cnx,$req);

    if ($res) {
        header('location:../user/cases.php');
    }
}


?>



