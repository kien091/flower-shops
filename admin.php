<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" />
  <link rel="stylesheet" href="./assets/CSS/admin.css">
  <link rel="stylesheet" href="./assets/CSS/responsive.css">
  <script src="./assets/js/admin.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/toast_message.css">
  <script src="./assets/js/toast_message.js"></script>
</head>

<body>
  <div class="tab_nav tab">
    <nav class="navbar ">
        <ul class="navbar-nav mr-auto">
          <a class="navbar-brand" href="#"><i class="fa-brands fa-google"></i></a>
          <li class="nav-item active">
            <a class="nav-link tablinks" onclick="openTab(event, 'tab1')">
              <i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link tablinks" onclick="openTab(event, 'tab2')">
              <i class="fa-solid fa-envelope"></i> Oders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tablinks" onclick="openTab(event, 'tab3')">
              <i class="fa fa-tags" aria-hidden="true"></i> Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tablinks" onclick="openTab(event, 'tab4')">
              <i class="fa-solid fa-user"></i> Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tablinks" href="./home.php">
              <i class="fa-solid fa-shop"></i> Channels</a>
          </li>
        </ul>
    </nav>
  </div>
  <div class="contentpage">
    <!-- home -->
    <div id="tab1" class="tabcontent" style="display:block;">
      <div class="head-tab">
        <div class="input-group  search-box">
          <input type="text" class="form-control search" placeholder="Search" aria-label="Search"
            aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                class="fa fa-search"></i></button>
          </div>
        </div>
        <div class="dropdown ms-sm-3 header-item topbar-user topbar-head-dropdown dropdown-hover-end">
          <?php
            require_once("./connect.php");

            if(isset($_COOKIE['id'])){
              $id_account = $_COOKIE['id'];
            }else{
              $id_account = "";
            }
            $sql = "SELECT avatar, name FROM account WHERE id_account = '$id_account'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" onclick="window.location.href='./profile.php'">
                <span class="d-flex align-items-center">
                  <?php
                  if($row['avatar'] != ""){
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/avatar/<?php echo $row['avatar']?>" alt="Header Avatar">
                    <?php
                  }else{
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/Logo/Logo1.jpg" alt="Header Avatar">
                    <?php
                  }?>
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $row['name']?></span>
                    <span class="d-none d-xl-block ms-1 fs-13 user-name-sub-text">Admin</span>
                  </span>
                </span>
              </button>
              <?php
            }
          ?>
        </div>
      </div>
      <div class="content_tab1">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="vr rounded bg-secondary opacity-50" style="width: 4px;"></div>
                  <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Order</p>
                  <?php
                    require_once("./connect.php");
                    $sql = "SELECT count(id_order) AS num_orders FROM torder";
                    $num_order = mysqli_fetch_assoc(mysqli_query($conn, $sql))['num_orders'];
                  ?>
                  <h4 class="mb-3"><span class="counter-value" data-target="98851.35"><?php echo $num_order;?> Order</span></h4>
                  <div class="d-flex align-items-center gap-2">
                    <?php
                      if($num_order < 10){
                        ?>
                          <p class="text-muted mb-0">It seems like your store is quite empty.</p>
                        <?php
                      }
                      else if($num_order < 25){
                        ?>
                        <p class="text-muted mb-0">Your store is operating smoothly.</p>
                        <?php
                      }else{
                        ?>
                        <p class="text-muted mb-0">Your store is growing rapidly.</p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Product</p>
                  <?php
                    require_once("./connect.php");
                    $sql = "SELECT count(id_product) AS num_products FROM product";
                    $num_product = mysqli_fetch_assoc(mysqli_query($conn, $sql))['num_products'];
                  ?>
                  <h4 class="mb-3"><span class="counter-value" data-target="98851.35"><?php echo $num_product;?> Products</span></h4>
                  <div class="d-flex align-items-center gap-2">
                  <?php
                      if($num_product < 10){
                        ?>
                          <p class="text-muted mb-0">The products are limited.</p>
                        <?php
                      }else{
                        ?>
                        <p class="text-muted mb-0">Your store is diverse.</p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Customer</p>
                  <?php
                    require_once("./connect.php");
                    $sql = "SELECT count(id_account) AS num_customer FROM account WHERE role = '1'";
                    $num_customer = mysqli_fetch_assoc(mysqli_query($conn, $sql))['num_customer'];
                  ?>
                  <h4 class=" mb-3"><span class="counter-value" data-target="98851.35"><?php echo $num_customer;?> Customers</span></h4>
                  <div class="d-flex align-items-center gap-2">
                    <?php
                      if($num_customer < 10){
                        ?>
                          <p class="text-muted mb-0">Your store is quite empty.</p>
                        <?php
                      }else{
                        ?>
                        <p class="text-muted mb-0">Your store is crowded with customers.</p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="recent-product" style="width: 100%;">
              <h5>Popular Product</h5>
              <div class="contain-table table-responsive">
                <table class="table table-striped bg-light">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Id Product</th>
                      <th scope="col">Name</th>
                      <th scope="col">Image</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Price</th>
                      <th scope="col">Categories</th>
                      <th scope="col">Details</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once("./connect.php");

                      $sql = "SELECT * FROM product LIMIT 5";
                      $result = mysqli_query($conn, $sql);
                      $number = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                          <td><?php echo ++$number; ?></td>
                          <td><?php echo $row['id_product']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td style="width:100px; height:100px; text-align:center;"><img src="./assets/images/product/<?php echo $row['image']; ?>" class="product_image" style="width:100%; height:100%"></td>
                          <td><?php echo $row['amount']; ?></td>
                          <td><?php echo $row['price'].".000 VNĐ"; ?></td>
                          <td><?php echo $row['categories']; ?></td>
                          <td style="width:200px; white-space: normal;"><?php echo $row['note']; ?></td>
                          <?php 
                          if($row['amount'] >= 10){
                            ?><td><span class="badge badge-success">In stock</span></td><?php
                          }
                          else if($row['amount'] > 0){
                            ?><td><span class="badge badge-warning">Low stock</span></td><?php
                          }
                          else {
                            ?><td><span class="badge badge-danger">Out of stock</span></td><?php
                          }?>
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Order -->
    <div id="tab2" class="tabcontent ">
      <div class="head-tab1">
        <div class="input-group  search-box">
          <input type="text" class="form-control search" placeholder="Search Order" aria-label="Search Order"
            aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                class="fa fa-search"></i></button>
          </div>
        </div>
        <div class="dropdown ms-sm-3 header-item topbar-user topbar-head-dropdown dropdown-hover-end">
          <?php
            require_once("./connect.php");
            $id_account = $_COOKIE['id'];
            $sql = "SELECT avatar, name FROM account WHERE id_account = '$id_account'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" onclick="window.location.href='./profile.php'">
                <span class="d-flex align-items-center">
                  <?php
                  if($row['avatar'] != ""){
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/avatar/<?php echo $row['avatar']?>" alt="Header Avatar">
                    <?php
                  }else{
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/Logo/Logo1.jpg" alt="Header Avatar">
                    <?php
                  }?>
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $row['name']?></span>
                    <span class="d-none d-xl-block ms-1 fs-13 user-name-sub-text">Admin</span>
                  </span>
                </span>
              </button>
              <?php
            }
          ?>
        </div>
      </div>
      <div class="content_tab2">
        <div class="container">
          <div class="row ">
            <div class="col-sm-4 d-flex flex-column">
              <div class="card">
                <div class="card-body ">
                  <div class="rounded " style="width: 50%; background-color: red; height: 4px;"></div>
                  <div class="maincard">
                    <?php
                      require_once("./connect.php");
                      $sql = "SELECT count(id_order) AS num_orders FROM torder";
                      $num_order = mysqli_fetch_assoc(mysqli_query($conn, $sql))['num_orders'];
                    ?>
                    <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Order</p>
                    <h4 class="mb-3"><span class="counter-value" data-target="98851.35"><?php echo $num_order;?> Order</span></h4>
                    <div class="d-flex align-items-center gap-2">
                      <?php
                        if($num_order < 10){
                          ?>
                            <p class="text-muted mb-0">It seems like your store is quite empty.</p>
                          <?php
                        }
                        else if($num_order < 25){
                          ?>
                          <p class="text-muted mb-0">Your store is operating smoothly.</p>
                          <?php
                        }else{
                          ?>
                          <p class="text-muted mb-0">Your store is growing rapidly.</p>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="rounded " style="width: 50%; background-color: red; height: 4px;"></div>
                    <?php
                      require_once("./connect.php");
                      $sql = "SELECT sum(total_price) AS total_price FROM torder";
                      $total = mysqli_fetch_assoc(mysqli_query($conn, $sql))['total_price'];
                    ?>
                  <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Earnings</p>
                  <h4 class="mb-3"><span class="counter-value" data-target="98851.35"><?php echo $total; ?>000 VNĐ</span></h4>
                  <div class="d-flex align-items-center gap-2">
                    <?php
                    if($total < 5000){
                      ?>
                      <p class="text-muted mb-0">Your store has low revenue.</p>
                      <?php
                    }else{
                      ?>
                      <p class="text-muted mb-0">Your store has stable revenue.</p>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="rounded " style="width: 50%; background-color: red; height: 4px;"></div>
                  <p class="text-uppercase fw-medium text-muted fs-14 text-truncate">Total Customer Order</p>
                    <?php
                      require_once("./connect.php");
                      $sql = "SELECT count(DISTINCT id_account) AS total_customer FROM torder";
                      $total_customer = mysqli_fetch_assoc(mysqli_query($conn, $sql))['total_customer'];
                    ?>
                  <h4 class=" mb-3"><span class="counter-value" data-target="98851.35"><?php echo $total_customer; ?> Customers</span></h4>
                  <div class="d-flex align-items-center gap-2">
                    <?php
                      if($total_customer < 5){
                        ?>
                        <p class="text-muted mb-0">You have fewer customer orders.</p>
                        <?php
                      }else{
                        ?>
                        <p class="text-muted mb-0">Your store seems to be quite crowded.</p>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="recent-product col-12">
            <h5>Order List</h5>
            <div class="contain-table ">
              <table class="table table-striped bg-light">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID Order</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Note</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      require_once("./connect.php");

                      $sql = "SELECT * FROM torder";
                      $result = mysqli_query($conn, $sql);
                      $number = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $id_product = $row['id_product'];
                        $sqli = "SELECT name FROM product WHERE id_product = '$id_product'";
                        $name = mysqli_fetch_assoc(mysqli_query($conn, $sqli))['name'];
                        ?>
                        <tr>
                          <td><?php echo ++$number; ?></td>
                          <td><?php echo $row['id_order']; ?></td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $row['quantity']; ?></td>
                          <td><?php echo $row['total_price']."000 VNĐ"; ?></td>
                          <td style="width:200px; white-space: normal;"><?php echo $row['address']; ?></td>
                          <td style="width:200px; white-space: normal;"><?php echo $row['note']; ?></td>
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" 
                              onclick="directDeleteOrder('<?php echo $row['id_order']; ?>')">Delete
                            </button>
                          </td>
                        </tr>
                        <?php
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function directDeleteOrder($id_order){
        document.cookie = 'from=' + encodeURIComponent("admin");
        document.cookie = 'id_order=' + encodeURIComponent($id_order);
        window.location.href='./delete_order.php';
      }
    </script>
    <!-- product -->
    <div id="tab3" class="tabcontent">
      <div class="head-tab1">
        <div class="input-group  search-box">
          <input type="text" class="form-control search" placeholder="Search Product" aria-label="Search Product"
            aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                class="fa fa-search"></i></button>
          </div>
        </div>
        <div class="add-product">
          <button class="btn btn-primary mb-15" onclick="window.location.href='./add_product.html'">
            <i class="fas fa-plus"></i> Add Product
          </button>
        </div>
        <div class="dropdown ms-sm-3 header-item topbar-user topbar-head-dropdown dropdown-hover-end">
          <?php
            require_once("./connect.php");
            $id_account = $_COOKIE['id'];
            $sql = "SELECT avatar, name FROM account WHERE id_account = '$id_account'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" onclick="window.location.href='./profile.php'">
                <span class="d-flex align-items-center">
                  <?php
                  if($row['avatar'] != ""){
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/avatar/<?php echo $row['avatar']?>" alt="Header Avatar">
                    <?php
                  }else{
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/Logo/Logo1.jpg" alt="Header Avatar">
                    <?php
                  }?>
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $row['name']?></span>
                    <span class="d-none d-xl-block ms-1 fs-13 user-name-sub-text">Admin</span>
                  </span>
                </span>
              </button>
              <?php
            }
          ?>
        </div>
      </div>
      <div class="content_tab2">
        <div class="container1">
          <div class="row filter-nav">
            <div class="col-2 mb-3 filter-item text-center">
              <h6>Filter</h6>
            </div>
            <div class="col-md-2 mb-3 filter-item">
              <select class="form-select w-100 rounded-pill" id="price-product">
                <option selected>Price</option>
                <option value="1">Under 100k</option>
                <option value="2">From 100k - 200k VND</option>
                <option value="3">From 200k - 500k VND</option>
                <option value="4">Over 500k</option>
              </select>
            </div>
            <div class="col-2 mb-3 filter-item ">
              <select class="form-select w-100 rounded-pill" id="event-product">
                <option selected>Event</option>
                <option value="1">Valentine Day</option>
                <option value="2">Birthday</option>
              </select>
            </div>
            <div class="col-2 mb-3 filter-item w-70 text-center" onclick="filter()">
              <button class="btn btn-success"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="recent-product col-12" style="width: 100%;">
            <h5>Product</h5>
            <div class="contain-table ">
              <table class="table table-striped bg-light" id="table-product">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Id Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      require_once("./connect.php");

                      $sql = "SELECT id_product, name, image, amount, price FROM product";
                      $result = mysqli_query($conn, $sql);
                      $number = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                          <td><?php echo ++$number; ?></td>
                          <td><?php echo $row['id_product']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td style="width:100px; height:100px; text-align:center;"><img src="./assets/images/product/<?php echo $row['image']; ?>" class="product_image" style="width:100%; height:100%"></td>
                          <td><?php echo $row['amount']; ?></td>
                          <td><?php echo $row['price'].".000 VNĐ"; ?></td>
                          <?php 
                          if($row['amount'] >= 10){
                            ?><td><span class="badge badge-success">In stock</span></td><?php
                          }
                          else if($row['amount'] > 0){
                            ?><td><span class="badge badge-warning">Low stock</span></td><?php
                          }
                          else {
                            ?><td><span class="badge badge-danger">Out of stock</span></td><?php
                          }?>
                          <td>
                            <button type="button" class="btn btn-primary btn-sm" 
                              onclick="directDeleteProduct('<?php echo $row['id_product']; ?>')">Delete
                            </button>
                          </td>                       
                        </tr>
                        <?php
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function directDeleteProduct($id_product){
        document.cookie = 'id_product=' + encodeURIComponent($id_product);
        window.location.href='./delete_product.php';
      }
    </script>
    <!-- Customers -->
    <div id="tab4" class="tabcontent">
      <div class="head-tab1">
        <div class="input-group  search-box">
          <input type="text" class="form-control search" placeholder="Search Customers" aria-label="Search Customers"
            aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                class="fa fa-search"></i></button>
          </div>
        </div>
        <div class="dropdown ms-sm-3 header-item topbar-user topbar-head-dropdown dropdown-hover-end">
          <?php
            require_once("./connect.php");
            $id_account = $_COOKIE['id'];
            $sql = "SELECT avatar, name FROM account WHERE id_account = '$id_account'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" onclick="window.location.href='./profile.php'">
                <span class="d-flex align-items-center">
                  <?php
                  if($row['avatar'] != ""){
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/avatar/<?php echo $row['avatar']?>" alt="Header Avatar">
                    <?php
                  }else{
                    ?>
                    <img class="rounded-circle header-profile-user1" src="./assets/images/Logo/Logo1.jpg" alt="Header Avatar">
                    <?php
                  }?>
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $row['name']?></span>
                    <span class="d-none d-xl-block ms-1 fs-13 user-name-sub-text">Admin</span>
                  </span>
                </span>
              </button>
              <?php
            }
          ?>
        </div>
      </div>
      <div class="content_tab2">
        <div class="container1">
          <div class="row contain-card">
            <div class="col-xxl-3 col-md-6" style="margin-top: 30px;">
              <div class="card card-height-100 bg-warning-subtle border-0 overflow-hidden">
                <div class="card-body p-4 z-1 position-relative colorCard">
                  <?php
                    require_once("./connect.php");
                    $sql = "SELECT count(DISTINCT id_account) AS customer FROM account WHERE role = '1'";
                    $customer = mysqli_fetch_assoc(mysqli_query($conn, $sql))['customer'];
                  ?>
                  <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="7845102"><?php echo $customer; ?> Customers Account</span>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6" style="margin-top: 30px;">
              <div class="card card-height-100 bg-success-subtle border-0 overflow-hidden">
                <div class="card-body p-4 z-1 position-relative colorCard">
                  <?php
                    require_once("./connect.php");
                    $sql = "SELECT count(DISTINCT id_account) AS ad FROM account WHERE role = '0'";
                    $ad = mysqli_fetch_assoc(mysqli_query($conn, $sql))['ad'];
                  ?>
                  <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="559.25"><?php echo $ad; ?> Admin Account</span>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="recent-product col-12" style="margin-top: 30px; width: 100%;">
            <h5>Customer List</h5>
            <div class="contain-table">
              <table class="table table-striped bg-light">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Id Account</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      require_once("./connect.php");

                      $sql = "SELECT id_account, name, phone, email, role FROM account";
                      $result = mysqli_query($conn, $sql);
                      $number = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        if($row['role'] == 1){
                          ?>
                          <tr>
                            <td><?php echo ++$number; ?></td>
                            <td><?php echo $row['id_account']?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo "passenger"?></td>
                            <td>
                              <button type="button" class="btn btn-primary btn-sm" 
                                onclick="directDeleteAccount('<?php echo $row['id_account']; ?>')">Delete
                              </button>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function directDeleteAccount($id_account){
        document.cookie = 'id_account=' + encodeURIComponent($id_account);
        window.location.href='./delete_customer.php';
      }
    </script>
    
    <!-- toast message -->
    <div class="toast" data-autohide="false"></div>
    <script>
      function filter(){
        var price = document.getElementById("price-product").value;
        var categories = document.getElementById("event-product").value;

        <?php
          require_once("./connect.php");

          $sql = "SELECT id_product, name, image, amount, price, categories FROM product";
          $result = mysqli_query($conn, $sql);
          $number = 0;
          $data = array();
          while($row = mysqli_fetch_assoc($result)){
            $data_row = array(
              'id' => $row['id_product'],
              'name' => $row['name'],
              'image' => $row['image'],
              'amount' => $row['amount'],
              'price' => $row['price'],
              'categories' => $row['categories']
            );
            $data[] = $data_row;
          }
        ?>

        var data = <?php echo json_encode($data); ?>;

        var table = document.getElementById("table-product");
        var tbody = table.getElementsByTagName("tbody")[0];
        while (tbody.firstChild) {
          tbody.removeChild(tbody.firstChild);
        }

        if(price != "Price"){
          if(price == "1"){
            data = data.filter(item => Number(item.price) < 100);
          }
          else if(price == "2"){
            data = data.filter(item => Number(item.price) >= 100 && Number(item.price) < 200);
          }
          else if(price == "3"){
            data = data.filter(item => Number(item.price) >= 200 && Number(item.price) < 500);
          }
          else if(price == "4"){
            data = data.filter(item => Number(item.price) >= 500);
          }
        }

        if(categories != "Event"){
          if(categories == "1"){
            data = data.filter(item => item.categories == "Valentine Day");
          }
          else if(price == "2"){
            data = data.filter(item => item.categories == "Birthday");
          }
        }

        for (let i = 0; i < data.length; i++) {
          const newRow = document.createElement("tr");

          const stt = document.createElement("td");
          stt.innerHTML = i + 1;
          newRow.appendChild(stt);

          const id = document.createElement("td");
          id.innerHTML = data[i].id;
          newRow.appendChild(id);

          const name = document.createElement("td");
          name.innerHTML = data[i].name;
          newRow.appendChild(name);
          
          const image = document.createElement("td");
          image.style.width = "100px";
          image.style.height - "100px";
          image.style.textAlign = "center";
          image.innerHTML = `<img src="./assets/images/product/${data[i].image}" class="product_image" style="width:100%; height:100%">`;
          newRow.appendChild(image);

          const amount = document.createElement("td");
          amount.innerHTML = data[i].amount;
          newRow.appendChild(amount);

          const price = document.createElement("td");
          price.innerHTML = data[i].price;
          newRow.appendChild(price);

          const status = document.createElement("td");
          if(Number(data[i].amount) >= 10){
            status.innerHTML = `<span class="badge badge-success">In stock</span>`;
          }
          else if(Number(data[i].amount) > 0){
            status.innerHTML = `<span class="badge badge-warning">Low stock</span>`;
          }
          else {
            status.innerHTML = `<span class="badge badge-danger">Out of stock</span>`;
          }
          newRow.appendChild(status);

          const editB = document.createElement("td");
          editB.innerHTML = `<button type="button" class="btn btn-primary btn-sm">Edit</button>`;
          newRow.appendChild(editB);

          const deleteB = document.createElement("td");
          deleteB.innerHTML = `<button type="button" class="btn btn-primary btn-sm">Delete</button>`;
          newRow.appendChild(deleteB);
          tbody.appendChild(newRow);
        }

      }

      const message = localStorage.getItem("message");
      if(message == "success"){
        showWelcome();
      }
      else if(message == "deleteOrderSuccess"){
        showDeleteOrder();
      }
      else if(message == "deleteProductSuccess"){
        showDeleteProduct();
      }
      else if(message == "deleteAccountSuccess"){
        showDeleteAccount();
      }
      localStorage.setItem("message", "");
    </script>
  </div>
</body>

</html>