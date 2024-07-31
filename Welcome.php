<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:login.php");
  // exit();
}
?>

<!doctype html>
<html lang="en">
  <head>

  <style>
  body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f4f4 !important;
  margin: 0;
  padding: 0;
}

.header {
  background-color: #343a40;
  color: #ffffff;
  padding: 10px;
  text-align: center;
}

.welcome-container {
  max-width: 800px;
  margin: 50px auto;
  text-align: center;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.welcome-heading {
  color: #007bff;
}

.container {
  padding: 20px;
}

.alert {
  background-color: #d4edda;
  color: #155724;
  border-color: #c3e6cb;
  border-radius: 8px;
  margin-top: 20px;
}

.alert-heading {
  color: #155724;
}

.alert p {
  margin-bottom: 0;
}

.alert a {
  color: #155724;
  font-weight: bold;
  text-decoration: underline;
}

.logout-link {
  color: #dc3545;
  font-weight: bold;
  text-decoration: none;
}

.logout-link:hover {
  text-decoration: underline;
}

  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome - <?php echo $_SESSION['username']?>!</title>
  </head>
  <body>
   <?php
    require 'partials/_nav.php'
    ?>
  <div class="welcome-container">
  <h2 class="welcome-heading">iSecure</h2>
    <div class="container my-4">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome - <?php  echo $_SESSION['username']?></h4>
        <p>Hey! How you doin? Welcome to iSecure <?php  echo $_SESSION['username']?>, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/Logout.php">Here</a> using this link.</p>
      </div>
     </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>