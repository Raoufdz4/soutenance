<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

$webimage="../dist/ServerData/img/colivraison.png";

$adminlink="admin.php";

$homelink="../index.php";

$caseslink="cases.php";

$productlink="produit.php";

$profilelink="profile.php";

$pricemanagelink="pricemanage.php";

$settingslink="parametre.php";

$logoutlink="auth/dec.php";

include '../init.php';

$dist = "../".$dist;

$partials  = "../".$partials;

$auth  = "../".$auth;

$pages = "../".$pages;

$plugins = "../".$plugins;

include '../config.php';

include '../icon.php';

include '../links/css.php';


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

<div class="text-muted mt-3 ml-2  ">Calcule :</div>
<hr>

    <div class="row mb-4">
      <div class="col-11 ml-3">
        <div class="row">
            <div class="col-4">
            <label for="">Product price:</label>
            <input type="number" id="price_presale" onkeyup="calculate()">
            </div>
        <div class="col-4">
        <label for="">Ads da</label>
        <input type="number" id="price_adsdz"  onkeyup="calculate()">
        </div>
      
        </div>
      <div class="row">
        <div class="col-4">
        <label for="">CPC%</label>
      <input type="number"  id="cpc"  onkeyup="calculate()">
        </div>
        <div class="col-4">
        <label for="">CPD%</label>
        <input type="number" id="cpd"  onkeyup="calculate()">
        </div>
        <div class="col-4">
        <label for="">Sale price</label>
      <input type="number" id="price_sale"  onkeyup="calculate()">
        </div>
      
      </div>
      </div>  
      
    </div>
    <div class="row mb-4">
        <div class="col-10">

        </div>
        <p id="result1">totalprice: </p>
        <p id="result2">Result: </p>
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
    var cpc = 0;
    var cpd = 0;
    var price_sale = 0;
    var totalprice = 0;
    var profit = 0;

function calculate() {
 price_presale = parseFloat(document.getElementById("price_presale").value);
 price_adsdz = parseFloat(document.getElementById("price_adsdz").value);
 cpc = parseFloat(document.getElementById("cpc").value);
 cpd = parseFloat(document.getElementById("cpd").value);
 price_sale = parseFloat(document.getElementById("price_sale").value);

if (!isNaN(price_presale) && !isNaN(price_adsdz) && !isNaN(cpc) && !isNaN(cpd)) {
                // Perform the addition
                var cpc_clc = (price_adsdz * 100)/cpc
                var cpd_clc =  (cpc_clc * 100)/cpd
                var livraison = 100
                var stock= 100
                var returnn = 0
                totalprice = price_presale + cpd_clc + livraison + stock + returnn
                
                // Display the result
                document.getElementById("result1").innerText = "totalprice: " + totalprice;
                if (!isNaN(price_sale)) {
                    profit = price_sale - totalprice
                    document.getElementById("result2").innerText = "profit: " + profit;
                }
                
            }


}
</script>



<?php


include $partials.'footer.php';

?>

</div>

<?php
include  '../links/js.php';
?>
</body>
</html>