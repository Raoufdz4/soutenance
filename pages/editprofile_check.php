<script src="../plugins/country-states/js/country-states.js"></script>
<script>
</script>
<?php
session_start();
include '../config.php';

$useremail=$_SESSION['email'];

if (isset($_POST['firstname_user']) && !empty($_POST['firstname_user'])){
    $fname = $_POST['firstname_user'];
    $fname= ucwords(strtolower($fname));
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        $lname=$row['last_name'];
        $req2="UPDATE user SET first_name='$fname',full_name='$fname $lname' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['lastname_user']) && !empty($_POST['lastname_user'])){
    $lname = $_POST['lastname_user'];
    $lname= ucwords(strtolower($lname));
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $row= mysqli_fetch_assoc($res1);
        $fname=$row['first_name'];
        $req2="UPDATE user SET last_name='$lname',full_name='$fname $lname' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['country']) && !empty($_POST['country'])){
    $country_code = $_POST['country'];
    ?>
    <script>
        const country_array = country_and_states.country;
        var user_country = country_array["<?php echo $country_code;?>"];
        
        document.addEventListener('DOMContentLoaded', function() {
      // Sample data to send

      // Create a new XMLHttpRequest object
      var xhr = new XMLHttpRequest();

      // Configure it: specify the type of request and the URL
      xhr.open('POST', 'editprofile_check.php', true);

      // Set the request header to indicate that we are sending JSON data
      xhr.setRequestHeader('Content-Type', 'application/json');

      // Set up the callback function to handle the response
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the response from the PHP file
          console.log(xhr.responseText);
        }
      };

      // Convert the JavaScript object to a JSON string
      var jsonData = JSON.stringify(user_country);

      // Send the JSON data to the PHP file
      xhr.send(jsonData);
    });
    </script>
    <?php
    $country_name=$_POST['country_name'];
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user SET country_code='$country_code',country='$country_name' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['state']) && !empty($_POST['state'])){
    $state_code = $_POST['state'];
    $state_name = $_POST['state_name'];
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user SET state_code='$state_code',`state`='$state_name' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['phone']) && !empty($_POST['phone'])){
    $phone = $_POST['phone'];
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user SET phone='$phone' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['adresse']) && !empty($_POST['adresse'])){
    $adresse = $_POST['adresse'];
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user SET adresse='$adresse' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['user_des']) && !empty($_POST['user_des'])){
    $user_des = $_POST['user_des'];
    $req1="SELECT * FROM user WHERE (email='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user SET user_description='$user_des' WHERE email='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['web_soc']) && !empty($_POST['web_soc'])){
    $web_soc = $_POST['web_soc'];
    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user_social SET user_web='$web_soc' WHERE id_user='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['git_soc']) && !empty($_POST['git_soc'])){
    $git_soc = $_POST['git_soc'];
    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user_social SET user_git='$git_soc' WHERE id_user='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['tw_soc']) && !empty($_POST['tw_soc'])){
    $tw_soc = $_POST['tw_soc'];
    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user_social SET user_twitter='$tw_soc' WHERE id_user='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['ins_soc']) && !empty($_POST['ins_soc'])){
    $ins_soc = $_POST['ins_soc'];
    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user_social SET user_insta='$ins_soc' WHERE id_user='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}
if (isset($_POST['fb_soc']) && !empty($_POST['fb_soc'])){
    $fb_soc = $_POST['fb_soc'];
    $req1="SELECT * FROM user_social WHERE (id_user='$useremail')";
    $res1=mysqli_query($cnx,$req1);
    if (mysqli_num_rows($res1)>0) {
        $req2="UPDATE user_social SET user_facebook='$fb_soc' WHERE id_user='$useremail'";
        $res2=mysqli_query($cnx,$req2);
    }
}  

?>
