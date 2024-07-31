<?php
 $login = false;
 $showError = false;
 $err="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username) || empty($password)){
        $err="This field cannot be empty.";
    } else{
        //  $sql = "SELECT * from users where username='$username' AND password ='$password'";
         $sql = "SELECT * from users where username='$username'";
         $result = mysqli_query($conn, $sql);
         $num = mysqli_num_rows($result);
         if($num == 1){
          while($row = mysqli_fetch_assoc($result)){
             if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
             }   
             else{
              $showError = "Invalid Credentials";
             }      
           }                  
         }
         else{
          $showError = "Invalid Credentials";
         }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <style>
      body {
          background-color: #f8f9fa !important;
          font-family: 'Arial', sans-serif;
      }

      .container {
          background-color: #ffffff !important;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          padding: 30px;
          margin-top: 50px;
      }

      h1 {
          color: #007bff;
      }

      .form-group {
          margin-bottom: 20px;
      }

      .form-label {
          font-size: 18px;
          color: #343a40;
      }

      .form-control {
          border: 2px solid #007bff;
          border-radius: 5px;
      }

      .btn-primary {
          background-color: #007bff !important;
          border: 1px solid #007bff;
      }

      .btn-primary:hover {
          background-color: #0056b3;
          border: 1px solid #0056b3;
      }

      .msg {
          color: #dc3545;
          font-size: 14px;
      }

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        margin-top: 20px;
    }
  }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <?php
    require 'partials/_nav.php'
        ?>
        <?php 
        if ($login){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>Login Successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error! </strong>Invalid Login Credentails
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
    ?>
    <div class="container my-4">
        <h1 class="text-center">Login</h1>
        <form action="/loginsystem/Login.php" method="POST">
            <div class="form-group col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <span class="msg"><?php echo $err ?></span>

            </div>
            <div class="form-group col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="msg"><?php echo $err ?></span>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


<script>
    // JavaScript to hide the error message when the user starts typing
    const inputFields = document.querySelectorAll('input[type="text"], input[type="password"]');
    inputFields.forEach(function (field) {
        field.addEventListener('input', function () {
            const errorSpan = this.nextElementSibling; // Assuming the error span is the next sibling
            errorSpan.innerText = '';
        });
    });
</script>
</body>
</html>