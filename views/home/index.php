<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Danh sách tin tức</title>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center">Danh sách tin tức</h1>
        <a href="index.php?controller=admin&action=login" class="btn btn-success">Đăng nhập</a>
    </div>

    <form method="GET" action="index.php" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm tin tức..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>


    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($news) && !empty($news)): ?>
                <?php foreach ($news as $index => $item): ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($item['id']) ?></th>
                        <td><?= htmlspecialchars($item['title']) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($item['image']) ?>" class="img-fluid" alt="Hình ảnh" style="max-height: 100px;">
                        </td>
                        <td><?= htmlspecialchars($item['category_name'])?></td>
                        <td><a href="index.php?controller=news&action=detail&id=<?= $item['id'] ?>"
                               class="btn btn-primary">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Không có tin tức nào để hiển thị.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
