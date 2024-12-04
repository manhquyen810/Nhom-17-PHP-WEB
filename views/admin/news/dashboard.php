<?php
require_once './models/User.php';
$user = User::getUser();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Chào mừng, <?php echo htmlspecialchars($user['username']); ?>!</h1>

    <div class="row mt-4">
        <div class="col-12">
            <h2 class="text-center">Quản lý tin tức</h2>
            <a href="index.php?controller=admin&action=manageNews" class="btn btn-primary btn-lg
            w-100 mt-2">
                Quản lý tin tức
            </a>
        </div>
    </div>

    <div class="mt-4">
        <a href="index.php?controller=admin&action=logout" class="btn btn-dark">Đăng xuất</a>
    </div>
</div>


</body>
</html>