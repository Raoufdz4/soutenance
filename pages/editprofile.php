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



<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-3">
<div class="col-lg-4 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Picture :</div>
<hr>
<div class=" m-4 d-flex justify-content-center">
    <div class="rounded-circle img-fluid bg-light d-flex justify-content-center" style="width: 180px;"><img src="../dist/img/colivraison.png" alt="avatar" class="rounded-circle img-fluid" style="width: 180px;"></div>
</div>
</div>


<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Details :</div>
<hr>
<form action="">
<div class="card-body">
  <div class="row">
  <div class="form-group col-md-6">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter email">
    </div>
    <div class="form-group col-md-6">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter email">
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <select class="form-control bfh-countries" id="country">
                    <option>select country</option>
                    </select>
    </div>
    <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <select class="form-control bfh-states " id="state">
                    <option>_</option>
                    </select>
    </div>
  </div>
                  
                  
  </div>
</form>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Description :</div>
<hr>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Social Media :</div>
<hr>
</div>
</div>



</div>
</div>
</div>











</div>


<div class="row">
<div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
</div>







</div>







      </div>
    </section>
        </div>








<?php


include $partials.'footer.php';

?>

</div>


<script src="../plugins/country-states/js/country-states.js"></script>

<script>
// user country code for selected option
var user_country_code = "DZ";

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

        for(let country_code in country_array){
            // set selected option user country
            let selected = (country_code == user_country_code) ? ' selected' : '';
            option += '<option value="'+country_code+'"'+selected+'>'+country_array[country_code]+'</option>';
        }
        id_country_option.innerHTML = option;
    };

    const createStatesNamesDropdown = () => {
        let selected_country_code = id_country_option.value;
        // get state names
        let state_names = states_array[selected_country_code];

        // if invalid country code
        if(!state_names){
            id_state_option.innerHTML = '<option>select state</option>';
            return;
        }
        let option = '';
        option += '<select id="state">';
        option += '<option>select state</option>';
        for (let i = 0; i < state_names.length; i++) {
            option += '<option value="'+state_names[i].code+'">'+state_names[i].name+'</option>';
        }
        option += '</select>';
        id_state_option.innerHTML = option;
    };

    // country select change event
    id_country_option.addEventListener('change', createStatesNamesDropdown);

    createCountryNamesDropdown();
    createStatesNamesDropdown();
})();

</script>

<?php
include  '../links/js.php';
?>
</body>
</html>