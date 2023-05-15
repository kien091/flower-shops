<?php
    require_once("./connect.php");

    $id_order = $_COOKIE['id_order'];
    $product = "SELECT * FROM torder WHERE id_order = '$id_order'";
    $id_product = mysqli_fetch_assoc(mysqli_query($conn, $product))['id_product'];
    $quantity = mysqli_fetch_assoc(mysqli_query($conn, $product))['quantity'];

    $product = "SELECT * FROM product WHERE id_product = '$id_product'";
    $amount = mysqli_fetch_assoc(mysqli_query($conn, $product))['amount'];
    
    $update_amount = intval($amount) + intval($quantity);
    $update = "UPDATE product SET amount = '$update_amount' WHERE id_product = '$id_product'";
    mysqli_query($conn, $update);

    $sql = "DELETE FROM torder WHERE id_order = '$id_order'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    $id_account = $_COOKIE['id'];
    if($_COOKIE['from'] == "history"){
        echo '<script>
            localStorage.setItem("message", "deleteOrderSuccess");
            window.location.href = "./history_order.php";
        </script>';
    }else{
        echo '<script>
            localStorage.setItem("message", "deleteOrderSuccess");
            window.location.href = "./admin.php";
        </script>';
    }

?>