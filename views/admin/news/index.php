<?php
require_once './models/Database.php';
require_once './models/News.php';

// Lấy tất cả tin tức từ database
$newsList = News::getAll();





?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Quản lý tin tức</h1>

    <div class="mb-3">
        <a href="index.php?controller=news&action=create" class="btn btn-primary">Thêm tin tức</a>
        <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary text-end">Quay
            lại</a>

    </div>



    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($newsList as $news): ?>
            <tr>
                <td><?= $news['id'] ?></td>
                <td><?= $news['title'] ?></td>
                <td><img src="<?= $news['image'] ?>" alt="image" style="width: 100px; height: auto;"></td>
                <td><?= $news['category_name'] ?></td>
                <td><?= $news['created_at'] ?></td>
                <td>
                    <a href="edit.php?controller=news&action=edit&id=<?= $news['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="delete.php?controller=news&action=delete&id=<?= $news['id'] ?>"
                       class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa tin này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
