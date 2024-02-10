<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>AdminLTE 3 | Log in</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,4001,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css"> 
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/dist/css/mycss.css"> 
</head>
<body class="hold-transition login-page bg-primary">
    <?php
    if (isset($_GET['info'])) {
        if ($_GET['info'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
                Login gagal! Username dan password salah!
            </div>
        <?php } else if ($_GET['info'] == "logout") { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Terima Kasih</h5>
                Anda telah berhasil logout
            </div>
        <?php } else if ($_GET['info'] == "login") { ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Mohon Maaf</h5>
                Anda harus login terlebih dahulu
            </div>
        <?php }
    } ?>

    <div class="login-box">
        <div class="card pt-4 pl-3 pr-3 cdr">
            <div class="text-center">
                <img src="assets/image/lgo.png" class="lgo" alt="Logo">
            </div>
            <h4 class="text-center text-primary"><b>APLIKASI PENGELOLAAN LAUNDRY</b></h4>
        </div>

        <div class="card-body login-card-body mb-5 cdr">
            <br>
            <form action="cek_login.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zM3 7V3a3 3 0 0 1 6 0v4a2 2 0 0 1 2 2h1a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1a2 2 0 0 0 0-4H3z"/>
                        </svg>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary"></div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block"> Masuk </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
