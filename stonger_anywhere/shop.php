<?php
    session_start();
    $database_name = "strongeranywhere";
    $con = mysqli_connect("localhost", "root", "" , $database_name);

    if(isset($_POST['add'])){
      if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");  //column: 'product_id'
        if(!in_array($_GET['id'], $item_array_id)){
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'product_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][$count] = $item_array;
            echo '<script>window.location="shop.php"</script>';
        }else{
            echo '<script>alert("Product is already Added in Cart")</script>';
            echo '<script>window.location="shop.php"</script>';
        }
      }else{
          $item_array = array(
            'product_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'product_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'],
          );
          $_SESSION['cart'][0] = $item_array;
      }
    }
    if(isset($_GET['action'])){
      if($_GET['action'] == "delete"){
            foreach ($_SESSION['cart'] as $key => $value) {
                    if($value['product_id'] == $_GET['id']){
                          unset($_SESSION['cart'][$key]);
                          echo '<script>alert("Product has been removed !")</script>';
                          echo '<script>window.location="shop.php"</script>';
                    }
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
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap');

    *{
      font-family: 'Titillium Web', sans-serif;
    }
    .product{
      border: 1px solid #eaeaec;
      margin: -1px 19px 3px -1px;
      padding: 10px;
      text-align: center;
      background-color: #efefef;
    }
    table, th, tr{
      text-align: center;
    }
    .title2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2%;
    }
    h2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2%;
    }
    table th{
      background-color: #efefef;

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

  <div id="demo" class="carousel slide " data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/home_workout_desktop_1900x.jpg?v=1585838157.jpg" alt="home2" width="2000" height="700">
        <div class="carousel-caption">
          <h1 style="font-size:150px;" > <font color = "yellow">SHOP WITH US</font></h1>

        </div>
      </div>
      <div class="carousel-item">
        <img src="media/clothing.jpg" alt="home3" width="2000" height="700">
        <div class="carousel-caption">
            <h1 style="font-size:150px;" > <font color = "yellow">SHOP WITH US</font></h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://img.gymshark.com/image/fetch/q_auto,f_auto/https://cdn.shopify.com/s/files/1/0156/6146/files/NEW_WEB_BANNER_SIZEArtboard_2_1900x.jpg?v=1585129274.jpg" alt="home4" width="2000" height="700">
        <div class="carousel-caption">
            <h1 style="font-size:150px;" > <font color = "yellow">SHOP WITH US</font></h1>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>


  <div class ="container" style = "width: 65%">
      <h2>Shopping Cart</h2>
      <div class="card-deck">
      <?php
        $query = "select * from product order by id asc";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_array($result)){

                  ?>
            <div class = "col-md-3">
                <form method = "post" action="shop.php?action=add&id=<?php echo $row['id']; ?>">

                  <div class = "product">
                      <img src="<?php echo $row['image']; ?>" class="img-responsive" width =200 height = 200>
                      <h5 class = "text-info"> <?php echo $row['pname']; ?></h5>
                      <h5 class="text-danger"> <?php echo $row['price']; ?></h5>
                      <input type = "text" name="quantity" class="form-control" value="1">
                      <input type="hidden" name="hidden_name" value="<?php echo $row['pname']; ?>" >
                      <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>" >
                      <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart" >
                  </div>
                </form>
            </div>
        <?php
          }
    }
        ?>
      </div>
        <div style="clear: both"></div>
        <br><br>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class = "table-responsive">
          <table class="table table-bordered">
            <tr>
                <th width="30%"> Product Name </th>
                <th width="10%"> Quantity </th>
                <th width="13%"> Price Details </th>
                <th width="10%"> Total Price </th>
                <th width="17%"> Remove item </th>
            </tr>

            <?php
                if(!empty($_SESSION['cart'])){
                  $total = 0;
                  foreach ($_SESSION['cart'] as $key => $value) {
                        ?>
              <tr>
                  <td><?php echo $value['item_name']; ?></td>
                  <td><?php echo $value['item_quantity']; ?> </td>
                  <td>$ <?php echo $value['product_price']; ?></td>
                  <td>$ <?php echo number_format( $value['item_quantity'] * $value['product_price'], 2); ?></td>
                  <td><a href = "shop.php?action=delete&id=<?php echo $value['product_id']; ?>"><span class="text-danger">Remove Items</span></a></td>
              </tr>

              <?php
                  $total = $total + ($value['item_quantity'] * $value['product_price']);
                }
               ?>

               <tr>
                  <td colspan="3" align="right">Total</td>
                  <th align="right">$<?php echo number_format($total, 2); ?></th>
                  <td></td>
               </tr>
               <?php
             }
               ?>
             </table>
        </div>

  </div>

  <a href="payment.php" style ="margin-left: 1000px">
      <button type="button" class="btn btn-outline-info">Proceed to Checkout</button>
    </a>
    <br><br>
    <hr width = "600" size = "2" style = "border:2px solid #C0C0C0">
    <br><br>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
