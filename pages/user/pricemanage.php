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
          <li class="breadcrumb-item active" aria-current="page">Gestion des prix</li>
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
      <div class="col-11 ml-3 ">
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

<div class="text-muted mt-3 ml-2  ">Calcule :</div>
<hr>

    <div class="row mb-4">
      <div class="col-11 ml-3">


        <div class="row">
            <div class="col-4">
            <label for="price_presale">Product price :</label>
            <input type="number" id="price_presale" onkeyup="calculate()">
            </div>
        </div>
<hr>
        <div class="row">
        <div class="col-4">
        <label for="price_adseuro">Ads euro :</label>
        <input type="number" id="price_adseuro"  onkeyup="calculate()">
        </div>
        </div>

      <div class="row">
        <div class="col-4">
        <label for="cpc">CPC% :</label>
      <input type="number"  id="cpc"  onkeyup="calculate()">
        </div>
      </div>

      <div class="row">
      <div class="col-4">
        <label for="cpd">CPD% :</label>
        <input type="number" id="cpd"  onkeyup="calculate()">
        </div>
      </div>
<hr>
<div class="row">
<p id="result1"  class="ml-5">Total price : </p>
</div>
<hr>
        <div class="row">
        <div class="col-4">
        <label for="">Sale price</label>
      <input type="number" id="price_sale"  onkeyup="calculate()">
        </div>
        </div>
        <hr>
<div class="row">
<p id="result2" class="ml-5">Profit : </p>
</div>
<hr>
      </div>  


    </div>
    <div class="row mb-4">
        <div class="col-10">

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



<script>
    var price_presale = 0;
    var price_adsdz = 0;
    var price_adseuro = 0;
    var cpc = 0;
    var cpd = 0;
    var price_sale = 0;
    var totalprice = 0;
    var profit = 0;

function calculate() {
 price_presale = parseFloat(document.getElementById("price_presale").value);
 price_adseuro = parseFloat(document.getElementById("price_adseuro").value);
 cpc = parseFloat(document.getElementById("cpc").value);
 cpd = parseFloat(document.getElementById("cpd").value);
 price_sale = parseFloat(document.getElementById("price_sale").value);

if (!isNaN(price_presale) && !isNaN(price_adseuro) && !isNaN(cpc) && !isNaN(cpd)) {
                // Perform the addition
                var price_adsdz = price_adseuro * 230
                var cpc_clc = (price_adsdz * 100)/cpc
                var cpd_clc =  (cpc_clc * 100)/cpd
                var livraison = 100
                var stock= 100
                var returnn = 0
                totalprice = price_presale + cpd_clc + livraison + stock + returnn
                totalprice = (Math.round(totalprice * 100) / 100).toFixed(2);
                // Display the result
                document.getElementById("result1").innerText = "Total price : " + totalprice + " DA";
                if (!isNaN(price_sale)) {
                    profit = price_sale - totalprice
                    profit = (Math.round(profit * 100) / 100).toFixed(2);
                    document.getElementById("result2").innerText = "Profit : " + profit + " DA";
                }
                
            }
}
</script>



<?php


include $partials.'footer.php';

?>

</div>

<?php
include  '../../links/js.php';
?>
</body>
</html>