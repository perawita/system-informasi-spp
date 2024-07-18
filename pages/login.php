<?php
require_once 'backend/app/function/GetRemeber.php';

$getAutentitas = new GetAutentikasiDevice;
$checkData = $getAutentitas->GetAutentikasi();
$getData = $checkData !== false ? $checkData : array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="./assets/OIP-removebg-preview.png" width="180" alt="">
                                </a>
                                <p class="text-center">SMA NEGERI 1 JERAWEH</p>
                                <form action="./backend/router/view.php?URL=Login" method="POST">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">Username</label>
                                        <input type="text" value="<?= isset($getData['user']) ? htmlspecialchars($getData['user']) : '' ?>" class="form-control" id="user" name="user" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="pass" class="form-label">Password</label>

                                        <input type="password" value="<?= isset($getData['pass']) ? htmlspecialchars($getData['pass']) : '' ?>" class="form-control" id="pass" name="pass">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="setRemeberDevice" name="flexCheckChecked" id="flexCheckChecked" <?= isset($getData['user']) ? '' : 'checked' ?>>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remember this Device
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                    <div class="d-flex align-items-center justify-content-center">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>