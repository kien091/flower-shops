<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" />
    <link rel="stylesheet" href="./assets/CSS/shopcart.css">
    <link rel="stylesheet" href="./assets/CSS/responsive.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                    <img src="./assets/images/Logo/Logo1-removebg.png" alt="Rose" class="img-fluid rounded-5"
                        style="max-width: 80%; height: auto;">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-8 col-6 d-flex justify-content-center align-items-center ">
                    <h1 class="text-center">Order Page</h1>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="./assets/images/Logo/Logo1-removebg.png" alt="Rose" class="img-fluid rounded-5">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php
        require_once("./connect.php");
        $id_product = $_POST['submit'];

        $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
        while($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))){
            $image = $row['image'];
            $name = $row['name'];
            $price = $row['price'];
            $note = $row['note'];
            ?>
            <form action="./handle_order.php" method="POST" id="order_product">
                <div class="container">
                    <div class="container">
                        <div class="head-item d-flex justify-content-center align-items-center">
                            <h1 class="fw-bold text-black mb-5">Order</h1>
                        </div>
                        <div class="card card-item mb-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="./assets/images/product/<?php echo $image?>" alt=""
                                        style="width:100% ; height: 90%;">
                                </div>
                                <div class="col-lg-6 bg-gray">
                                    <h3 class="fw-bold mb-4.5 mt-2 pt-1"><?php echo $name?></h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between">
                                        <h5><?php echo $price.".000 VNĐ"?></h5>
                                    </div>
                                    <hr class="my-4">
                                    <h5 class="text-uppercase mb-3 mt-3">Address</h5>
                                    <div class="form-outline">
                                        <input type="text" id="address" class="form-control form-control-lg" name="address" 
                                            value="Enter your address" onfocus="clearValue(event)" onblur="restoreValue(event)" defaultValue="Enter your address"/>
                                    </div>
                                    <h5 class="text-uppercase mb-3 mt-3">Note</h5>
                                    <div class="form-outline">
                                        <input type="text" id="note" class="form-control form-control-lg" name="note"
                                            value="Enter your note" onfocus="clearValue(event)" onblur="restoreValue(event)" defaultValue="Enter your note"/>
                                    </div>
                                    <h5 class="text-uppercase mb-3 mt-3">Mô tả sản phẩm</h5>
                                    <div class="form-outline">
                                        <p><?php echo $note?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 d-flex align-items-center">
                                            <button class="btn " type="button"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>
        
                                            <input id="form" min="1" name="quantity" value="1" type="number"
                                                class="form-control " />
        
                                            <button class="btn" type="button"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" 
                                            value="<?php echo $id_product?>" name="submit" onclick="checkValue()">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            break;
        }
    ?>
    <script>
        function clearValue(event) {
            var input = document.getElementById(event.target.id);
            if (input.value === input.defaultValue) {
                input.value = '';
            }
        }

        function restoreValue(event) {
            var input = document.getElementById(event.target.id);
            if (input.value === '') {
                input.value = input.defaultValue;
            }
        }

        let form = document.getElementById('order_product');
        form.addEventListener("submit", () => {
            var address = document.getElementById('address');
            if (address.value === address.defaultValue) {
                address.value = '';
            }
            var note = document.getElementById('note');
            if (note.value === note.defaultValue) {
                note.value = '';
            }
        })
    </script>
</body>

</html>