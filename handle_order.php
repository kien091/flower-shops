<?php
    require_once("./connect.php");

    $id_product = $_POST['submit'];
    $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
    $price = mysqli_fetch_assoc(mysqli_query($conn, $sql))['price'];
    
    $quatity = $_POST['quantity'];
    $total_price = intval($price) * intval($quatity);
    $address = $_POST['address'];
    $id_account = $_COOKIE['id'];
    $note = $_POST['note'];

    $amount = mysqli_fetch_assoc(mysqli_query($conn, $sql))['amount'];
    if(intval($amount) < intval($quatity)){
        echo '<script>
            localStorage.setItem("message", "errorOrder");
            window.location.href = "./home.php";
        </script>';
    }else{
        $update_amount = $amount - $quatity;
        $decressAmount = "UPDATE product SET amount = '$update_amount' WHERE id_product = '$id_product'";
        $insert = "INSERT INTO torder(id_product, quantity, total_price, address, id_account, note) VALUES('$id_product', '$quatity', '$total_price', '$address', '$id_account', '$note')";
        mysqli_query($conn, $insert);
        mysqli_query($conn, $decressAmount);
        mysqli_close($conn);
        echo '<script>
            localStorage.setItem("message", "successOrder");
            window.location.href = "./home.php";
        </script>';
    }
?>