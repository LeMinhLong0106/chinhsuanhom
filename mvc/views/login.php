
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <base href="<?php echo BASE; ?>">

    <!-- Custom fonts for this template-->
    <link href="public/admin/Admin/vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/admin/Admin/css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <style>
        .bg-login-image {
            background-image: url('public/images/anh-bia-summer.jpg');

        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <form action="login/login" method="POST">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Chào mừng bạn trở lại!</h1>
                                        </div>
                                        <?php
                                        if (isset($data["result"])) {
                                            if ($data["result"] == true) {
                                            } else {

                                                echo "<div class= 'alert-danger' style='text-align: center; margin: 0 auto;height: 35px;'>
                                                • Tên đăng nhập hoặc mật khẩu không đúng.
                                                </div>";
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <?php echo "<br>"; ?>
                                            <input type="text" placeholder="Nhập tên tài khoản..." name="email" class="form-control" value="<?php if(isset($_SESSION['login']['Email'])) echo $_SESSION['login']['Email']; unset($_SESSION['login']['Email']);?>">
                                            <span class="text-danger"><?php if (isset($_SESSION['error']['Email'])) {
                                                echo $_SESSION['error']['Email'];
                                                unset($_SESSION['error']['Email']); 
                                            } ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Mật khẩu" name="password" class="form-control">
                                            <span class="text-danger"><?php if (isset($_SESSION['error']['Password'])) {
                                                echo $_SESSION['error']['Password'];
                                                unset($_SESSION['error']['Password']); 
                                            } ?></span>
                                        </div>
                                        <div class="form-group"> 
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/admin/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="public/admin/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/admin/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/admin/Admin/js/sb-admin-2.min.js"></script>

</body>

</html>