<?php
    require_once("./connect.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $check_admin = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($conn, $check_admin);
    if(mysqli_num_rows($result) > 0){
        $role = mysqli_fetch_assoc(mysqli_query($conn, $check_admin))['role'];
        $id_account = mysqli_fetch_assoc(mysqli_query($conn, $check_admin))['id_account'];
        if($role == 0){
            if(mysqli_fetch_assoc(mysqli_query($conn, $check_admin))['password'] == $password){
                echo '<script>
                    localStorage.setItem("message", "success");
                    const id = "'.$id_account.'";
                    document.cookie = "id=" + encodeURIComponent(id);
                    window.location.href = "./admin.php";
                </script>';
            }
        }
        else{
            if(password_verify($password, mysqli_fetch_assoc(mysqli_query($conn, $check_admin))['password'])){
                echo '<script>
                    localStorage.setItem("message", "success");
                    const id = "'.$id_account.'";
                    document.cookie = "id=" + encodeURIComponent(id);
                    window.location.href = "./home.php";
                </script>';
            }
        }
    }
    echo '<script>
            localStorage.setItem("message", "error");
            window.location.href = "./index.php";
        </script>';
    mysqli_close($conn);
?>
