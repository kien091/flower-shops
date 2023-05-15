<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History_Order</title>
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
                            <img class="rounded-circle header-profile-user1" src="./assets/images/avatar/<?php echo $row['avatar'];?>" alt="Header Avatar">
                            <?php
                        }else{
                            ?>
                            <img class="rounded-circle header-profile-user1" src="./assets/images/Logo/Logo1.jpg" alt="Header Avatar">
                            <?php
                        }?>
                        <span class="text-start ms-xl-2">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $row['name'];?></span>
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
                    <div class="recent-product">
                        <h5>History Order</h5>
                        <div class="contain-table table-responsive">
                            <table class="table table-striped bg-light">
                                <thead>
                                    <tr>
                                    <th scope="col">STT</th>
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

                                        $id_account = $_COOKIE['id'];
                                        $sql = "SELECT * FROM torder WHERE id_account = '$id_account'";
                                        $result = mysqli_query($conn, $sql);
                                        $number = 0;
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id_product = $row['id_product'];
                                            $sqli = "SELECT name FROM product WHERE id_product = '$id_product'";
                                            $name = mysqli_fetch_assoc(mysqli_query($conn, $sqli))['name'];
                                            ?>
                                            <tr>
                                            <td><?php echo ++$number; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['total_price']; ?></td>
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
                        <div class="pt-5">
                            <h6 class="mb-0"><a href="home.php" class="text-body"><i
                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast" data-autohide="false"></div>
    <script>
      function directDeleteOrder($id_order){
        document.cookie = 'from=' + encodeURIComponent("history");
        document.cookie = 'id_order=' + encodeURIComponent($id_order);
        window.location.href='./delete_order.php';
      }

      const message = localStorage.getItem("message");
      if(message == "deleteOrderSuccess"){
        showDeleteOrder();
      }
      localStorage.setItem("message", "");
    </script>
</body>

</html>