<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" />
    <!-- <link rel="stylesheet" href="./assets/CSS/shopcart.css"> -->
    <!-- <link rel="stylesheet" href="./assets/CSS/responsive.css"> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                    <img src="./assets/images/Logo/Logo1-removebg.png" alt="Rose" class="img-fluid rounded-5"
                    style="max-width: 80%; height: auto;">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-8 col-6 d-flex justify-content-center align-items-center ">
                    <h1 class="text-center">Profile Page</h1>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="./assets/images/Logo/Logo1-removebg.png" alt="Rose" class="img-fluid rounded-5">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php">Logout</a>
                      </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="card mb-3" style="border-radius: 10px;">
                    <div class="row">
                        <?php
                        require_once("./connect.php");
                        $id_account = $_COOKIE['id'];
                        $sql = "SELECT name, email, phone, role FROM account WHERE id_account = '$id_account'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="col-lg-4 text-center text-dark" style="background-color: #f5c366; border-radius: 10px;">
                                <img src="./assets/images/Logo/Logo1-removebg.png" alt="Avatar" class="img-fluid"
                                    style="width: 500px; border-radius: 50%" />
                                <h5><?php echo $row['name']?></h5>
                                <?php 
                                if($row['role'] == 0){
                                    ?>
                                    <p>Admin</p>
                                    <?php
                                }else{
                                    ?>
                                    <p>Passenger</p>
                                    <?php
                                }?>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div class="col-lg-8 text-center text-dark">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6>Name</h6>
                                            <p class="text-muted"><?php echo $row['name']?></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6>Email</h6>
                                            <p class="text-muted"><?php echo $row['email']?></p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6>Address</h6>
                                            <p class="text-muted">Nha Trang - Khánh Hoà</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6>Phone Number</h6>
                                            <p class="text-muted"><?php echo $row['phone']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>