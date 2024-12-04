<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Thêm Tin Tức Mới</h1>

    <form method="POST" action="index.php?controller=news&action=create">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Chọn danh mục</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
    </form>

    <p class="mt-3"><a href="index.php?controller=admin&action=manageNews" class="btn btn-secondary">Quay lại</a></p>
</div>
</body>
</html>
