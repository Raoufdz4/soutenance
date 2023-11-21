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
        



<!-- make ur content here -->

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
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
          </ol>
        </nav>
      </div>
    </div>
<div class="row ml-3 mb-5">
    <div class="col-md-12">
        <h2 class="h3 mb-4 page-title">Settings</h2>
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Security</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Notifications</a>
                </li>
            </ul>
            <h5 class="mb-0 mt-5">Security Settings</h5>
            <p>These settings are helps you keep your account secure.</p>
            <div class="list-group mb-5 shadow">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">Enable Activity Logs</strong>
                            <p class="text-muted mb-0">Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="activityLog" checked="">
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">2FA Authentication</strong>
                            <span class="badge badge-pill badge-success">Enabled</span>
                            <p class="text-muted mb-0">Maecenas sed diam eget risus varius blandit.</p>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-sm">Disable</button>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">Activate Pin Code</strong>
                            <p class="text-muted mb-0">Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="pinCode">
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mb-0">Recent Activity</h5>
            <p>Last activities with your account.</p>
            <table class="table border bg-white">
                <thead>
                    <tr>
                        <th>Device</th>
                        <th>Location</th>
                        <th>IP</th>
                        <th>Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - Windows 10</th>
                        <td>Paris, France</td>
                        <td>192.168.1.10</td>
                        <td>Apr 24, 2019</td>
                        <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="col"><i class="fe fe-smartphone fe-12 text-muted mr-2"></i>App - Mac OS</th>
                        <td>Newyork, USA</td>
                        <td>10.0.0.10</td>
                        <td>Apr 24, 2019</td>
                        <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - iOS</th>
                        <td>London, UK</td>
                        <td>255.255.255.0</td>
                        <td>Apr 24, 2019</td>
                        <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                    </tr>
                </tbody>
            </table>
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

<?php
include  '../links/js.php';
?>
</body>
</html>