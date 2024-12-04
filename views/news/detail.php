<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Chi tiết tin tức</title>
</head>
<body>
<div class="container mt-5">

    <div class="container mt-5">
        <?php if (isset($newsItem) && !empty($newsItem)): ?>
            <h1><?= htmlspecialchars($newsItem['title']) ?></h1>
            <h2>Thể loại: <?= htmlspecialchars($newsItem['category_name']) ?></h2>
            <p>Nội dung: <?= nl2br(htmlspecialchars($newsItem['content'])) ?></p>
            <img src="<?= htmlspecialchars($newsItem['image']) ?>" class="img-fluid" alt="...">

        <?php else: ?>
            <p>Không có tin tức nào để hiển thị.</p>
        <?php endif; ?>

    </div>

</div>
<div class="container mt-5">
    <a href="index.php" class="btn btn-dark">Quay lại danh sách tin tức</a>
</div>

</body>
</html>
