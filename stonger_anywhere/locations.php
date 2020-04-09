<?php
    $con = mysqli_connect("localhost", "root", "", "strongeranywhere");

$output = '';

    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        $query = mysqli_query($con, "Select * from location where Country like '%$searchq%' or City like '%$searchq%' or Address like '%$searchq%' ");
        $count = mysqli_num_rows($query);
        if($count ==0){
          $output = 'No result found !!' ;
        } else {
              while($row = mysqli_fetch_array($query)){
                    $country = $row['Country'];
                    $city = $row['City'];
                    $addr = $row['Address'];
                    $output .= '<div>'.$city .'    '."   |   ".'     '    .$addr.'</dv>';

              }
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
  <link rel="stylesheet" type="text\css" href="css\style2.css">
  <script type = "text/javascript">
        function active(){
          var searchBar = document.getElementById('searchBar');

          if(searchBar.value == 'Search...'){
              searchBar.value = ''
              searchBar.placeholder = 'Search...'
          }
        }

        function inactive(){
          var searchBar = document.getElementById('searchBar');

          if(searchBar.value == ''){
              searchBar.value = 'Search...'
              searchBar.placeholder = ''
          }
        }

  </script>
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
    <p><h1 style = "font-size : 90px;"><font color = "grey"> Gym Locations </font></h1></p>
      <hr width = "200" size = "2" style = "border:2px solid #C0C0C0">
      <p>
          We’ve spent over 50 years defining fitness and now we’re reinventing it.
          With personal fitness profiles backed by 3D scanning technology, both traditional and digital personal training options and new STUDIO offerings that go past a simple class;
          StrongerAnywhere Gym has evolved so you can transform your life. Start here to find the StrongerAnywhere Gym nearest you along with location information, amenities and hours.
           Click through for membership pricing, join online options, class schedules and more.
      </p>

      <p> Currently We are in <strong>India, USA & United Kingdom.</strong> </p>

  </div>


  <form action="locations.php" method="post" align = "center">
      <input type = "text" name = "search" id ="searchBar" placeholder="" value="Search..." maxlength = "25" autocomplete = "off" onMouseDown="active();" onBlur="inactive();" />
      <input type = "submit" name = "submit" id="searchBtn" value="Search" />
  </form>


  &emsp;
  <br>
  <br>


 <div class ="container text-center">
  <?php print("$output");  ?>
</div>
    <br><br><br>
    <hr width = "800" size = "2" style = "border:2px solid #C0C0C0">
    <br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
