<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController {

    // Hiển thị danh sách bài viết
    public function index() {
        // Lấy từ khóa tìm kiếm nếu có
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        var_dump($keyword);

        if ($keyword) {
            $news = News::search($keyword);
        } else {

            $news = News::getAll();
        }
        var_dump($news);
        $categories = Category::getAll();


        include 'views/home/index.php';
    }

    // Hiển thị chi tiết bài viết
    public function detail($id) {

        $news = News::getById($id);
        include 'views/news/detail.php';
    }
}
?>
