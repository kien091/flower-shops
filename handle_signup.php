<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/toast_message.css">
    <script src="./assets/js/toast_message.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <?php
        require_once("./connect.php");

        $name = $_POST['lastname']. ' '.$_POST['firstname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $check = "SELECT * FROM account WHERE email = '$email'";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result) > 0){
            echo '<script>
                localStorage.setItem("message", "error");
                window.location.href = "./signup.php";
            </script>';
        }
        else{
            $insert_account = "INSERT INTO account(name, phone, email, password, role) VALUES('$name', '$phone', '$email', '$password', 1)";
            if(mysqli_query($conn, $insert_account)){
                echo '<script>
                    localStorage.setItem("message", "success");
                    window.location.href = "./index.php";
                </script>';
            }
        }
        mysqli_close($conn);
    ?>
</body>
</html>