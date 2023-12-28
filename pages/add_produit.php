<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

include '../init.php';

$dist = "../".$dist;

$partials  = "../".$partials;

$auth  = "../".$auth;

$pages = "../".$pages;

$plugins = "../".$plugins;

include '../config.php';


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
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Demo</li>
          </ol>
        </nav>
      </div>
    </div>

 <!-- make ur content here -->



 
 <div class="card card-default col-5">
      <div class="card-header text-bold ">
      <h3 class="card-title pl-2">Ajouter un produit</h3> 
    </div>
      <div class="card-body">
    <form action="add_check.php" method="post" enctype="multipart/form-data">
        <!-- Text Input -->
        <label for="name">Name:</label>
        <input type="text" class="form-control col-12" id="name" name="product_name"placeholder="name" required><br>

        <!-- Textarea -->
        

        <div class="form-group">
            <label for="message">Produit description :</label>
            <textarea class="form-control col-12" id="text"  name="descr" rows="3" required></textarea>
        </div>

        <div class="form-group col-9">
      <label for="image">Select an image:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" required>
        <label class="custom-file-label" for="image">Choose file</label>
      </div>
    </div>
      
        <!-- Submit Button -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
    </div>
   
</div>




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

<?php
include  '../links/js.php';
?>
</body>
</html>


