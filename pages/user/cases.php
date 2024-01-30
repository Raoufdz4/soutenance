<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

$webimage="../../dist/ServerData/img/colivraison.png";

$adminlink="../admin/admin.php";

$homelink="../../index.php";

$caseslink="cases.php";

$productlink="produit.php";

$profilelink="profile.php";

$pricemanagelink="pricemanage.php";

$settingslink="parametre.php";

$logoutlink="../php_handling/auth/dec.php";

include '../../init.php';

$dist = "../../".$dist;

$partials  = "../../".$partials;

$auth  = "../../".$auth;

$pages = "../../".$pages;

$plugins = "../../".$plugins;

include '../../config.php';

include '../../icon.php';

include '../../links/css.php';


include $partials.'header_top.php';

include $partials.'header_left.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<body class="sidebar-mini layout-fixed">
<div class="wrapper">

<?php

include $partials.'header_top.php';

include $partials.'header_left.php';

?>
        



        <div class="content-wrapper" style="min-height: 2080.12px;"> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <div class="row">
      <div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="#">Index</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cases</li>
          </ol>
        </nav>
      </div>
    </div>




<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-1 ml-1 mr-1">
<div class="col-12 bg-gray-light m-1 rounded">

<div class="text-muted mt-3 ml-2  ">Cases :</div>
<hr>
  <div class="row">
    <div class="col-12 ml-2">
    <label class="ml-2" for="country">Available cases :</label>
    </div>
    </div>
    <div class="row mb-4">
      <div class="col-9 ml-3">
      <select class="form-control bfh-countries" name="cases" id="cases">
        <option value="*" selected="selected">Select case</option>
        <?php 
        $req="SELECT * FROM cases WHERE cases_user='ALL' OR cases_user='$useremail'";
        $res=mysqli_query($cnx,$req);
        if ($res) {
          while ($row=mysqli_fetch_assoc($res)) {
            echo '<option value="'.$row['id_case'].'">'.$row['case_name'].'</option>';
          }
        }
        ?>
                    </select>

      </div>  
                    <div class="col-2 ml-4 d-flex justify-content-end">
    <a href="../php_handling/addcases.php" class="btn btn-primary file-input-label pl-4 pr-4">Add case</a>
    </div>
    </div>
    
  </div>  

</div>
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-1 ml-1 mr-1">
<div class="col-12 bg-gray-light m-1 rounded">

<div class="text-muted mt-3 ml-2  ">Case details :</div>
<hr>
  <div class="row">
    <div class="col-12 ml-2">
    <div id="caseDetails">
    <!-- Display data here -->
  </div>
    </div>
    </div>
   

    

</div>
</div>
</div>
</div>
</div>
</div>




    <!-- make ur content here -->






    <div class="row">
<div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
</div>


      </div>
    </section>
        </div>







<?php


include $partials.'footer.php';

?>

</div>
<script>
    $(document).ready(function() {
    // Attach an event listener to the select element
    $('#cases').change(function() {
        // Get the selected option value
        var selectedCaseId = $(this).val();

        // Use AJAX to fetch data from the server
        $.ajax({
            type: 'POST',
            url: '../php_handling/casesoption.php',
            data: { cases: selectedCaseId },
            dataType: 'json', // Specify that the expected response is JSON
            success: function(response) {
                // Check if the response contains an error
                if (response.error) {
                    console.error('Error fetching data: ' + response.error);
                } else {
                    // Process the response data
                    if (response.length > 0) {
                        var firstDataItem = response[0];
                        console.log('Ads Euro:', firstDataItem.ads_euro);
                        console.log('Exchange Rate:', firstDataItem.exchange_rate);
                        console.log('CPC:', firstDataItem.cpc);
                        console.log('CPD:', firstDataItem.cpd);
                        // ... process other properties

                        // Update the content of the caseDetails div with the fetched data
                        // Modify this part according to your HTML structure
                        $('#caseDetails').html('<p>Ads Euro: ' + firstDataItem.ads_euro + '</p>');
                        $('#caseDetails').append('<p>Exchange Rate: ' + firstDataItem.exchange_rate + '</p>');
                        $('#caseDetails').append('<p>CPC: ' + firstDataItem.cpc + ' %</p>');
                        $('#caseDetails').append('<p>CPD: ' + firstDataItem.cpd + ' %</p>');
                        // ... append other properties
                    } else {
                        console.log('No data returned from the server.');
                        // You might want to clear the content of #caseDetails in this case
                        $('#caseDetails').html('');
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error: ' + textStatus, errorThrown);
            }
        });
    });
});

  </script>
  
<?php
include  '../../links/js.php';
?>
</body>
</html>