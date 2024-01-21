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

$logoutlink="../auth/dec.php";

include '../../init.php';

$dist = "../../".$dist;

$partials  = "../../".$partials;

$auth  = "../../".$auth;

$pages = "../../".$pages;

$plugins = "../../".$plugins;

include '../../config.php';

include '../../icon.php';

include '../../links/css.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse sidebar-closed">
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
            <li class="breadcrumb-item active" aria-current="page">Home</li>
          </ol>
        </nav>
      </div>
    </div>
        <div class="row">
          
            
        <div class="col-md-6">

          
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tendances</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <canvas id="myChart"></canvas>
              </div>


          
            </div>



            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Produits</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Produit</th>
                      <th>Prix</th>
                      <th>Vente</th>
                      <th style="width: 40px">Infos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Produit 1</td>
                      <td>$50</td>
                      <td>$150</td>
                      <td><i class="fa-solid fa-magnifying-glass"></i></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Produit 2</td>
                      <td>$30</td>
                      <td>$140</td>
                      <td><i class="fa-solid fa-magnifying-glass"></i></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Produit 3</td>
                      <td>$20</td>
                      <td>$110</td>
                      <td><i class="fa-solid fa-magnifying-glass"></i></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Produit 4</td>
                      <td>$60</td>
                      <td>$180</td>
                      <td><i class="fa-solid fa-magnifying-glass"></i></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Produit 5</td>
                      <td>$70</td>
                      <td>$200</td>
                      <td><i class="fa-solid fa-magnifying-glass"></i></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          

            
          </div>
            
          <div class="col-md-6">
            

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Prévision</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <canvas id="line-chart"></canvas>
              </div>


          
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gestion des prix</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          <!-- /.col -->
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aperçu</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 ">
                <table class="table table-hover text-nowrap ">
                  <thead>
                    <tr>
                      <th>Aujourd'hui</th>
                      <th>Hier</th>
                      <th>les 7 derniers jours</th>
                      <th>Ce mois</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>$ 100</td>
                      <td>$ 150</td>
                      <td>$ 1100</td>
                      <td>$ 3200</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



          <div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-2">
          </div>
        <!-- /.row -->
      </div>


      
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php


include $partials.'footer.php';

?>

  </div>
  <?php

include  '../../links/js.php';

?>
<script src="../../dist/ServerData/js/script.js"></script>
</body>
</html>