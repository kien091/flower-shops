<?php
    require_once("./connect.php");

    $id_product = $_COOKIE['id_product'];
    $sql = "DELETE FROM product WHERE id_product = '$id_product'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo '<script>
        localStorage.setItem("message", "deleteProductSuccess");
        window.location.href = "./admin.php";
    </script>';
?>