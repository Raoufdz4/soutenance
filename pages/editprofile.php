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
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
<form action="editprofile_check.php" method="post">

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-3">
<div class="col-lg-4 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Picture :</div>
<hr>
<div class="row m-4 d-flex justify-content-center">
    <div class="rounded-circle img-fluid bg-light d-flex justify-content-center" style="width: 180px;">
    <img src="../dist/img/colivraison.png" alt="avatar" class="rounded-circle img-fluid" style="width: 180px;">
  </div>
</div>
<div class="row m-4 d-flex justify-content-center">        
<div class="container d-flex justify-content-center">
            <a href="aaaa.php" class="btn btn-outline-primary file-input-label ">Edit image</a>     
        </div>   
</div>
</div>
<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Details :</div>
<hr>
<div class="card-body">
  <div class="row">
  <div class="form-group col-md-6">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname_user" value="<?php 
                    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['first_name'];}?>">
        
    </div>
    <div class="form-group col-md-6">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" id="lastname"  name="lastname_user" value="<?php 
                    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['last_name'];}?>">
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <select class="form-control bfh-countries" name="country" id="country" autocomplete="off">
                    <option>select country</option>
                    </select>
    </div>
    <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <select class="form-control bfh-states" name="state" id="state">
                    <option>_</option>
                    </select>
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php 
                    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['phone'];}?>">
    </div>
    <div class="form-group col-md-6">
                    <label for="adresse">adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php 
                    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['adresse'];}?>">
    </div>
  </div>              
  </div>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-4 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Description :</div>
<hr>
<div class="form-group col-md-12">
                    <label class="pl-1" for="user_des">User details</label>
                    <textarea class="form-control" id="user_des" name="user_des" aria-label="With textarea" rows="5" cols="40" maxlength="30" placeholder="<?php 
                    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_description'];}?>"></textarea>
    </div>
</div>
<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Social Media :</div>
<hr>
<div class="row pl-2 pr-2">
<div class="form-group col-md-12">
                    <i class="fas fa-globe fa-lg text-warning"></i>
                    <label class="pl-1" for="web_soc">web</label>
                    <input type="text" class="form-control" name="web_soc" id="web_soc" value="<?php 
                    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_web'];}?>" placeholder="https:\\www.example.com">
    </div>
</div>
<div class="row pl-2 pr-2">
<div class="form-group col-md-6">
<i class="fab fa-github fa-lg" style="color: #333333;"></i>
                    <label class="pl-1" for="git_soc">Github</label>
                    <input type="text" class="form-control" name="git_soc" id="git_soc" value="<?php 
                    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_git'];}?>" placeholder="https:\\www.example.com">
    </div>
    <div class="form-group col-md-6">
    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                    <label class="pl-1" for="tw_soc">Twetter</label>
                    <input type="text" class="form-control" name="tw_soc" id="tw_soc" value="<?php 
                    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_twitter'];}?>" placeholder="https:\\www.example.com">
    </div>
</div>
<div class="row pl-2 pr-2">
<div class="form-group col-md-6">
<i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                    <label class="pl-1" for="ins_soc">Instagram</label>
                    <input type="text" class="form-control" name="ins_soc" id="ins_soc" value="<?php 
                    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_insta'];}?>" placeholder="https:\\www.example.com">
    </div>
    <div class="form-group col-md-6">
    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <label class="pl-1" for="fb_soc">Facebook</label>
                    <input type="text" class="form-control" name="fb_soc" id="fb_soc" value="<?php 
                    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        echo $row['user_facebook'];}?>" placeholder="https:\\www.example.com">
    </div>
</div>

</div>
<div class="col-lg-11 bg-gray-light m-2 rounded">
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
    <input class="btn btn-primary file-input-label m-3" type="submit" value="Save">
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
    
        </div>



        




<?php


include $partials.'footer.php';

?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../plugins/country-states/js/country-states.js"></script>
<script>
    $(document).ready(function() {
// user country code for selected option
var user_country_code = "<?php 
$req1="SELECT * FROM user WHERE (email='$useremail')";
$res1=mysqli_query($cnx,$req1);
$row= mysqli_fetch_assoc($res1);
$country_code=$row['country_code'];
if (!empty($country_code)) {
  echo $country_code;
};
?>";
var user_state_code = "<?php 
$req1="SELECT * FROM user WHERE (email='$useremail')";
$res1=mysqli_query($cnx,$req1);
$row= mysqli_fetch_assoc($res1);
$state_code=$row['state_code'];
if (!empty($state_code)) {
  echo $state_code;
};
?>";
(() => {
    // script https://www.html-code-generator.com/html/drop-down/state-name

    // Get the country name and state name from the imported script.
    const country_array = country_and_states.country;
    const states_array = country_and_states.states;

    const id_state_option = document.getElementById("state");
    const id_country_option = document.getElementById("country");

   
    
    const createCountryNamesDropdown = () => {
        let option =  '';
        option += '<option value="">select country</option>';

        for (let country_code in country_array) {
    // set selected option user country
    let selected = (country_code == user_country_code) ? ' selected' : '';
    
    // Check if the current country_code is the user_country_code

    // Create the option HTML
    option += '<option value="'+country_code+'"'+selected+'>'+country_array[country_code]+'</option>';
}

// Assuming you have a select element with the id "id_country_option"
id_country_option.innerHTML = option;
    };

    
    const createStatesNamesDropdown = () => {
    let selectedCountryCode = id_country_option.value;
    let stateNames = states_array[selectedCountryCode];

    // if invalid country code
    if (!stateNames) {
        id_state_option.innerHTML = '<option>select state</option>';
        return;
    }

    let option = '';
    option += '<select id="state">';
    option += '<option>select state</option>';

    for (let i = 0; i < stateNames.length; i++) {
        let selected = (stateNames[i].code == user_state_code) ? ' selected' : '';
        option += '<option value="' + stateNames[i].code + '"' + selected + '>' + stateNames[i].name + '</option>';
    }
    option += '</select>';
    
    // Assuming you have an input element with the id "user_state_name"

    // Set the value of the user_state_name input based on the user_state_code
    
    

    id_state_option.innerHTML = option;

    
};

    // country select change event
    id_country_option.addEventListener('change', createStatesNamesDropdown);

   


    createCountryNamesDropdown();
    createStatesNamesDropdown();
    


})();




});


</script>


<?php
include  '../links/js.php';
?>
</body>
</html>