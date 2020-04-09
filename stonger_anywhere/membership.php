<?php
      session_start();

      $db = mysqli_connect("localhost","root","", "strongeranywhere");
      if(isset($_POST['register_btn'])){
/*        session_start();     */
        $fname = mysqli_real_escape_string($db,$_POST['fname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);

        if($password == $password2){
                $password = md5($password);
                $sql = "Insert into user (firstname, lastname, email, gender, mobile, password) value ('$fname', '$lname', '$email', '$gender', '$mobile', '$password')";
                mysqli_query($db, $sql);
                $_SESSION['message'] = "Registration Successful !!";
                header("location: confirm.php");
        }else{
                $_SESSION['message'] = "The two password do not match";
        }
      }
 ?>

<!DOCTYPE html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text\css" href="css\style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style type="text/css">
      form {margin-left: 650px;
            }
</style>
</head>
<body>
  <!--Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <!--  <a class="navbar-brand" href="#">Navbar</a>  -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="programs.php">Fitness Programs</a>
        <a class="nav-item nav-link" href="blog.php">Blog</a>
        <a class="nav-item nav-link" href="locations.php">Locations</a>
        <a class="nav-item nav-link" href="shop.php">Shop Gear</a>
        <a class="nav-item nav-link" href="membership.php">Membership</a>
      <!--  <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Membership</a>  -->
      </div>
    </div>
  </nav>

  <img src = "media/location.jpg" width = "100%" height = 500>
  <div class= "container text-center">
    <p><h1 style = "font-size : 90px;"><font color = "grey"> Gym Membership </font></h1></p>
      <hr width = "200" size = "2" style = "border:2px solid #C0C0C0">
      <p>
          StrongerAnywhere Gym has been delivering results and transforming lives since 2015.
          As pioneers of the industry, we’re dedicated to providing you with the coaching, workout plans,
          and amenities you need to experience real change. From strength training and group exercise classes, to the latest
          cardio equipment and
          Personal Training options - our team is with you at every step of your fitness journey.
      </p>

      <p><strong> Register Now & pay at joining. </strong></p>
      <p><small class="text-muted">Your details would be removed in case of non-submission of fee within 15 days of registration.</small></p>
  </div>


  <form method = "post" action="membership.php" align = "center">
      <table>
          <tr>
            <td>First Name:</td>
              <td><input type = "text" name="fname" class="textInput"></td>
          </tr>
          <tr>
              <td>Last Name:</td>
              <td><input type = "text" name="lname" class="textInput"></td>
          </tr>
          <tr>
              <td>Email:</td>
              <td><input type = "email" name="email" class="textInput"></td>
          </tr>
          <tr>
              <td>Gender</td>
              <td>
                  <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                  <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                  <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Other</label>
              </td>
          </tr>

          <tr>
              <td>Mobile No:</td>
              <td><input type = "text" name="mobile" class="textInput"></td>
          </tr>
          <tr>
              <td>Password:</td>
              <td><input type = "password" name="password" class="textInput"></td>
          </tr>
          <tr>
              <td>Confirm Password:</td>
              <td><input type = "password" name="password2" class="textInput"></td>
          </tr>
          <tr>
              <td></td>
              <td><input type = "submit" name="register_btn" value = "Register"></td>
          </tr>

      </table>
  </form>

  <br><br>
      <hr width = "900" size = "2" style = "border:2px solid #C0C0C0">
  <br><br>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
