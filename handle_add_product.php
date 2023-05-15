<?php
        require_once("./connect.php");

        if(isset($_POST['submit']) && isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if($error === 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed = array("jpg", "jpeg", "png");

                if(in_array($img_ex_lc, $allowed)){
                    $new_name_img = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_path = './assets/images/product/'.$new_name_img;
                    move_uploaded_file($tmp_name, $img_path);

                    // add to database
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];
                    $price = $_POST['price'];
                    $categories = $_POST['categories'];
                    $note = $_POST['description'];

                    $add_product = "INSERT INTO product(name, image, amount, price, categories, note) VALUES('$name', '$new_name_img', '$amount', '$price', '$categories', '$note')";
                    mysqli_query($conn, $add_product);
                    header("Location: ./admin.php");
                }else{
                    header("Location: ./admin.php");
                }
            }else{
                header("Location: ./admin.php");
            }
        }
        else{
            header("Location: ./admin.php");
        }
        mysqli_close($conn);
    ?>