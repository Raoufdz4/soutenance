   <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
   <a href="../index.php" class="brand-link">
     <img src="../dist/img/colivraison.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8"> 
    <span class="brand-text font-weight-light"><b>Colivraison</b></span>
  </a> 

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
      <!-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <!-- <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div> -->
    <!-- </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"> 
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">
              <?php 
              if (basename($_SERVER['PHP_SELF'])=="produit.php") {
               echo ' <a href="produit.php" class="nav-link active">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Produits
              </p>
            </a>';
              }
            else {
              echo '<a href="produit.php" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Produits
              </p>
            </a>';
            }
              ?>
          </li>
          <li class="nav-item">
              <?php 
              if (basename($_SERVER['PHP_SELF'])=="cases.php") {
               echo ' <a href="cases.php" class="nav-link active">
               <i class="nav-icon fa-solid fa-folder-tree  "></i>
              <p>
              Les Cas
              </p>
            </a>';
              }
            else {
              echo '<a href="cases.php" class="nav-link">
              <i class="nav-icon fa-solid fa-folder-tree  "></i>
              <p>
                Les Cas
              </p>
            </a>';
            }
              ?>
          </li>
              <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fa-solid fa-chart-line"></i>
              <p>
               Tendances
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fa-solid fa-magnifying-glass-chart"></i>
              <p>
                Prévision
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fa-solid fa-file-invoice-dollar"></i>
              <p>
                Gestion des prix
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="widgets.html" class="nav-link">
            <i class="nav-icon fa-solid fa-cloud"></i>
              <p>
                API
              </p>
            </a>
          </li>
          
          <li class="nav-item">
          <?php 
              if (basename($_SERVER['PHP_SELF'])=="parametre.php") {
               echo ' <a href="parametre.php" class="nav-link active">
               <i class="nav-icon fa fa-gear"></i>
              <p>
              Paramètre
              </p>
            </a>';
              }
            else {
              echo '<a href="parametre.php" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
              Paramètre
              </p>
            </a>';
            }
              ?>
          </li>
          
             
           
          <!-- <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Starter Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-circle nav-icon"></i>
                <p>Active Page</p>
              </a>
            </li>  -->
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>
        </li> -->
         <!-- <li class="nav-item">
          <a href="dec.php" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>
              deconnecter
            </p>
          </a>
        </li>  -->
      <!-- </ul> -->
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>