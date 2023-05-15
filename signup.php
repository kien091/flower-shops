<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/toast_message.css">
    <script src="./assets/js/toast_message.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid d-flex justify-content-center align-items-center contain-login">
                <div class="img-contain">
                    <img src="./assets/images/Login/login.jpg" class=" img-login img-fluid shadow-lg" alt="Login Image">
                </div>
                <div class="col-md-6 col-lg-5 login-form col-12 container1">
                    <form class="p-5 rounded shadow-lg bg-light login-form1" action="handle_signup.php" method="POST">
                        <h1 class="text-center mb-4 text-login">Sign Up</h1>
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <label for="firstname" class="form-label">
                                    First Name:
                                </label>
                                <input type="text" class="form-control" id="firstname" placeholder="Type Your Name"
                                    required name="firstname">
                            </div>
                            <div class="col-lg-6">
                                <label for="firstname" class="form-label">
                                    Last Name:
                                </label>
                                <input type="text" class="form-control" id="firstname" placeholder="Type Your Name"
                                    required name="lastname">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-12">
                                <label for="Phone" class="form-label">
                                <i class="fa fa-calendar" aria-hidden="true"></i> Phone:
                                </label>
                                <input type="text" class="form-control" id="phone" placeholder="Type Your Phone"
                                    required name="phone">
                            </div>
                        </div>
                        <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fa fa-envelope" aria-hidden="true"></i> Email:
                                </label>
                                <input type="text" class="form-control" id="email" placeholder="Type Your Email"
                                    required name="email">
                            </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                Password:</label>
                            <input type="password" class="form-control" id="password" required name="password">
                        </div>
                        <div class="mb-3">
                            <label for="Re-password" class="form-label">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                Re-Password:</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3 form-check-signup">
                            <label class="form-check-label" for="remember">Do You Have Login ?</label>
                            <a href="index.php">Click Here !!!</a>
                        </div>
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="toast" data-autohide="false"></div>

    <script>
        const message = localStorage.getItem("message");
        if(message == "error"){
            showErrorSignUpToast ();
        }
        localStorage.setItem("message", "");
    </script>
</body>

</html>