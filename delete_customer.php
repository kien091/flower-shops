<?php
    require_once("./connect.php");

    $id_customer= $_COOKIE['id_account'];
    $sql = "DELETE FROM account WHERE id_account = '$id_customer'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo '<script>
        localStorage.setItem("message", "deleteAccountSuccess");
        window.location.href = "./admin.php";
    </script>';
?>