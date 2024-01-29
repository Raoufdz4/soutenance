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

$caseslink="../user/cases.php";

$productlink="../user/produit.php";

$profilelink="../user/profile.php";

$pricemanagelink="../user/pricemanage.php";

$settingslink="../user/parametre.php";

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

 <form action="addproduit_check.php" method="post" id="product_form" enctype="multipart/form-data">

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-3">
<div class="col-lg-4 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Product Picture :</div>
<hr>
<div class="row m-4 d-flex justify-content-center">
    <div class="rounded-circle img-fluid bg-light d-flex justify-content-center" style="width: 180px;">
    <img src="../../dist/ServerData/img/noimage.png" alt="productimage" class="img-fluid border border-5 border-end" id="image_preview" style="width: 180px;height:180px;">
  </div>
</div>
<div class="row m-4 d-flex justify-content-center">        
<div class="container d-flex justify-content-center">
            <label class="btn btn-outline-primary file-input-label" for="product_image">Edit image</label>
            <input type="file" name="product_image" id="product_image" accept=".jpg, .jpeg, .png" hidden>     
        </div>   
</div>
</div>
<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Product Details :</div>
<hr>
<div class="card-body">
  <div class="row">
  <div class="form-group col-md-12">
                    <label class="pl-1" for="product_name">Product name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
        
    </div>
  </div>

  <div class="row">
 <div class="form-group col-md-12">
                    <label class="pl-1" for="product_des">Product details</label>
                    <textarea class="form-control" id="product_des" name="product_des" aria-label="With textarea" rows="5" cols="40" maxlength="30"></textarea>
    </div>
  </div>
           
  </div>
</div>
</div>

<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
    <a href="../user/produit.php" class="btn btn-outline-primary file-input-label m-3 pl-4 pr-4">Back</a>
    <input class="btn btn-primary file-input-label m-3 pl-4 pr-4" type="submit" value="Save">
    </div>
  </div>
  
</div>
</div>

</div>
</div>
</div>
</div>

</form>



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

document.getElementById('product_image').addEventListener('change', handleFileSelect);

function handleFileSelect(event) {
  const input = event.target;
  const files = input.files;

  for (let i = 0; i < files.length; i++) {
    const file = files[i];

    // Check if the file is an image (you can modify this condition based on your criteria)
    if (!file.type.startsWith('image/')) {
      alert('Please select only image files.');
      input.value = ''; // Clear the file input
      return;
    }
  }

  

}

function handleImageInputChange(evt) {
  const [file] = product_image.files;
  if (file) {
    image_preview.src = URL.createObjectURL(file);
  }
}

product_image.onchange = handleImageInputChange;


  
</script>
<?php
include  '../../links/js.php';
?>
</body>
</html>


